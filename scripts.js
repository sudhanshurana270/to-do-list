$(document).ready(function(){
    // Load tasks on page load
    loadTasks();

    // Function to load tasks
    function loadTasks(){
        $.ajax({
            url: 'load_tasks.php',
            type: 'GET',
            success: function(response){
                $('#tasks').html(response);
            }
        });
    }

    // Add task
    $('#add-button').click(function(){
        var taskName = $('#task-name').val();
        $.ajax({
            url: 'add_task.php',
            type: 'POST',
            data: {task_name: taskName},
            success: function(response){
                loadTasks();
                $('#task-name').val('');
            }
        });
    });

    // Complete task
    $(document).on('click', '.complete', function(){
        var taskId = $(this).data('task-id');
        $.ajax({
            url: 'complete_task.php',
            type: 'POST',
            data: {task_id: taskId},
            success: function(response){
                loadTasks();
            }
        });
    });

    // Remove task
    $(document).on('click', '.remove', function(){
        var taskId = $(this).data('task-id');
        $.ajax({
            url: 'remove_task.php',
            type: 'POST',
            data: {task_id: taskId},
            success: function(response){
                loadTasks();
            }
        });
    });
});
