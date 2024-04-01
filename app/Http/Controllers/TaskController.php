<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Exception;


class TaskController extends Controller
{
    // -- Web Methods --

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('tasks.index', [
            'tasks' => $tasks,
            'title' => 'Lista de tarefas'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validatedData = $request->validated();

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        /*$tasks = Task::findOrFail($id);
        return view('tasks.edit', [
            'tasks' => $tasks,
            'title' => 'Editar tarefa'
        ]);*/

        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all()); // Assuming all fields are editable for simplicity
        return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso!');
    }

    // -- API Methods --
    public function list(Request $request)
    {
        $response = ['data' => null, 'meta' => null];

        try {
            if ($request->hasHeader('authorization')) {
                $token = $request->header('authorization');
                $token = mb_convert_encoding($request->header('authorization'), 'UTF-8');
                if ($token == env('API_KEY')) {
                    $reponse['meta'] = [
                        'response_type' =>'success',
                        'status' => 200,
                        'message' => 'Operação realizada com sucesso!'
                    ];
                    $tasks = Task::orderBy('created_at', 'desc');

                    $tasks = $tasks->select(
                        'id',
                        'title as taskTitle',
                        'description as taskDescription',
                        'status as taskStatus',
                        date('d/m/Y', strtotime('created_at')),
                        date('d/m/Y', strtotime('updated_at'))
                    )->get();

                    $response['data'] = $tasks;

                    return response()->json($response)->header('Content-Type', 'application/json; charset=UTF-8');

                } else {
                    $response['meta'] = [
                        'responseType' => 'WARNING',
                        'status' => 206,
                        'message' => 'Token invalido'
                    ];
                    return response()->json($response)->header('Content-Type', 'application/json; charset=UTF-8');
                }
            } else {
                $response['meta'] = [
                    'responseType' => 'WARNING',
                    'status' => 206,
                    'message' => 'Token AUTHORIZATION não informado'
                ];
                return response()->json($response)->header('Content-Type', 'application/json; charset=UTF-8');
            }
        } catch (Exception $e) {
            $response['meta'] = [
                'responseType' => 'ERROR',
                'status' => 300,
                'message' => 'Ocorreu um erro na requisição'
            ];
            return response()->json($response)->header('Content-Type', 'application/json; charset=UTF-8');
        }
    }

    public function storeApi(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task, 201);
    }

   /* public function updateApi(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return response()->json($task, 200);
    }*/

    public function destroyApi(Task $task)
    {
        try {
            $task->delete();
            return response()->json(['msg' => 'Tarefa deletada com sucesso!'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }
    }
}
