@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-2">

        <h1 class="text-2xl font-bold mb-4">Editar Tarefa</h1>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
            <form method="POST" id="update-form"  action="{{ route('tasks.update', $tasks->id) }}">
                @csrf
                @method('PUT')
                <!-- Título -->
                <label class="block text-sm font-bold text-gray-700" for="title">
                    Título
                </label>
                <input
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" name="title" value="{{ $tasks->title }}">

                <!-- Descrição -->
                <label class="block text-sm font-bold text-gray-700" for="description">
                    Descrição
                </label>
                <input
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                type="text" name="description" value="{{ $tasks->description }}">

                <!-- Status -->
                <label class="block text-sm font-bold text-gray-700" for="status">
                    Status
                </label>
                <select name="status"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="pendente" {{ $tasks->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="concluída" {{ $tasks->status === 'concluída' ? 'selected' : '' }}>Concluída</option>
                    <option value="cancelada" {{ $tasks->status === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>

                <div class="flex items-center justify-start mt-4 gap-x-2">
                    <button type="submit"
                        class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
