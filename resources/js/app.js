import axios from 'axios'; // Assuming you use Axios for API calls

document.addEventListener('DOMContentLoaded', async () => {
    try {
        const response = await axios.get('/api/tasks');
        const tasks = response.data;

        // Loop through tasks and create list items
        tasks.forEach(task => {
            const listItem = document.createElement('li');
            listItem.classList.add('p-2', 'border-b', 'border-gray-200');
            listItem.textContent = task.title; // Assuming 'title' field

            document.getElementById('tasks-list').appendChild(listItem);
        });
    } catch (error) {
        console.error('Error fetching tasks:', error);
        // Handle errors gracefully (e.g., display an error message)
    }
});
