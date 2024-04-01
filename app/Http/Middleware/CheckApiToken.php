<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Recuperar o token do header
        $authToken = $request->header('Authorization');

        // 2. Checa se o token é válido
        if (!$authToken || !str_starts_with($authToken, 'Bearer ')) {
            return response()->json(['message' => 'Não Autenticado'], 401);
        }

        // 3. Extrair o token
        $token = str_replace('Bearer ', '', $authToken);

        // 4. Procurar o usuário pelo token
        $user = User::where('api_token', $token)->first();
        if (!$user) {
            return response()->json(['message' => 'Token Inválido'], 401);
        }

        // 5. Atribuir o usuário ao request
        $request->auth = $user;

        return $next($request);
    }
}
