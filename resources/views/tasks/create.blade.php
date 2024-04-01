@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-2">
        <h2>Create Task</h2>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf {{-- CSRF token --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                    Título
                </label>
                <input type="text" id="title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">
                    Descrição
                </label>
                <input type="text" id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700" for="status">
                    Status
                </label>
                <select name="status"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="pendente">Pendente</option>
                    <option value="concluída">Concluída</option>
                    <option value="cancelada">Cancelada</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Task
            </button>
        </form>
    </div>
@endsection
