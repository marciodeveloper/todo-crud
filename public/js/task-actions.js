document.addEventListener('DOMContentLoaded', () => {
    const confirmModal = document.getElementById('confirm-modal');
    const updateModal = document.getElementById('update-modal');
    const createModal = document.getElementById('create-modal');

    const createButtons = document.querySelectorAll('.create-task-btn');
    createButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            showModal(createModal);
        });

        document.getElementById('confirm-create').addEventListener('click', () => {
            const createForm = createModal.querySelector('#create-task-form');
            createForm.submit();
            closeModal(modal);
        });
    });

    const updateButtons = document.querySelectorAll('.update-task-btn');
    updateButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const taskId = button.dataset.taskId;
            fetchTaskData(taskId);
            showModal(updateModal);
            const updateForm = updateModal.querySelector('#edit-task-form');
            updateForm.action = `/tasks/` + taskId;
        });

        document.getElementById('confirm-update').addEventListener('click', () => {
            const updateForm = updateModal.querySelector('#edit-task-form');
            updateForm.submit();
            closeModal(modal);
        });
    });

    const deleteButtons = document.querySelectorAll('.delete-task-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const taskId = event.target.closest('button').dataset.taskId;
            confirmDelete(taskId, confirmModal);
        });
    });

    function confirmDelete(taskId, modal) {
        showModal(modal);

        const deleteForm = modal.querySelector('#delete-form');
        console.log("taskId:", taskId);
        console.log("deleteForm:", deleteForm);
        console.log("modal:", modal);
        deleteForm.action = `/tasks/` + taskId;
        console.log("deleteForm action:", deleteForm.action);
        deleteForm.style.display = 'block';

        document.getElementById('confirm-delete-btn').addEventListener('click', () => {
            deleteForm.submit();
            closeModal(modal);
        });
    }

    function showModal(modal) {
        modal.classList.remove('hidden');
    }

    window.closeModal = function(modal) {
        modal.classList.add('hidden');
    }

    async function fetchTaskData(taskId) {
        const response = await fetch(`/tasks/${taskId}/edit`, { method: 'GET' });
        const taskData = await response.json();
        populateEditForm(taskData);
    }

    function populateEditForm(taskData) {
        const editForm = document.getElementById('edit-task-form');
        editForm.elements['title'].value = taskData.title;
        editForm.elements['description'].value = taskData.description;
        editForm.elements['status'].value = taskData.status;
    }
});
