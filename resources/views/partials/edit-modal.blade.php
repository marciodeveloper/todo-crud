<!-- Modal Edit Task -->
<div id="update-modal" class="hidden fixed z-20 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                <div class="container mx-auto px-4 py-2">
                    <h1 class="text-2xl font-bold mb-4">Editar Tarefa</h1>
                    <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                        <form method="POST" id="edit-task-form">
                            @csrf
                            @method('PUT')

                            <!-- Título -->
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="title">
                                Título
                            </label>
                            <input
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            type="text" name="title">

                            <!-- Descrição -->
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="description">
                                Descrição
                            </label>
                            <input
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            type="text" name="description" value="{{ $task->description }}">

                            <!-- Status -->
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="status">
                                Status
                            </label>
                            <select name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="pendente" {{ $task->status === 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="concluída" {{ $task->status === 'concluída' ? 'selected' : '' }}>Concluída</option>
                                <option value="cancelada" {{ $task->status === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>

                        </form>
                    </div>
                </div>

            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" id="confirm-update" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Atualizar</button>
                <button type="button" onclick="closeModal(document.getElementById('update-modal'))" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/task-actions.js') }}"></script>
