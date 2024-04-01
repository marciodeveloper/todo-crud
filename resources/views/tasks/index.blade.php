
@extends('layouts.app')

@section('content')
        <div class="container mx-auto px-4 py-2 flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Tarefas Todo</h1>
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 create-task-btn">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Criar Tarefa
            </button>
        </div>



        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
             <tr>
                <th scope="col" class="p-4">Título</th>
                <th scope="col" class="p-4">Descrição</th>
                <th scope="col" class="p-4">Status</th>
                <th scope="col" class="p-4" colspan="2">Ações</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($tasks as $task)
                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                     <td class="p-2 w-2">{{ $task->title }}</td>
                     <td class="p-2 w-2">{{ $task->description }}</td>
                     <td>
            @switch($task->status)
                @case('cancelada')
                    <div class="h-4 w-4 rounded-full inline-block mr-2 bg-red-700"></div>
                    @break
                @case('concluída')
                    <div class="h-4 w-4 rounded-full inline-block mr-2 bg-green-400"></div>
                    @break
                @case('pendente')
                    <div class="h-4 w-4 rounded-full inline-block mr-2 bg-yellow-300"></div>
                    @break
                @default
                    text-gray-800
            @endswitch
            {{ $task->status }}
        </td>
                     <td class="p-2 w-2">
                     <button class="text-indigo-600 hover:text-indigo-900 mr-2 update-task-btn" id="redirect-to-edit-form" data-task-id="{{ $task->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                     </td>

                     <td class="p-2 w-2">
                     <button class="text-red-600 hover:text-red-800 delete-task-btn" data-task-id="{{ $task->id }}">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>

                    </td>
                 </tr>
             @endforeach
         </tbody>
     </table>

     <div class="mt-4 flex items-center justify-center">
            {{ $tasks->links('vendor.pagination.tailwind') }}
        </div>


    </div>
@endsection

@include('partials.create-modal')
@include('partials.edit-modal')
@include('partials.confirm-modal')

