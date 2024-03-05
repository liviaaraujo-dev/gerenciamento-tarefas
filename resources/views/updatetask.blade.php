<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/updatetask.css">
    <title>Editar Task</title>
</head>

<body>
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('home.index') }}" class="page-initial">
        Voltar para tela inicial
    </a>

    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        <h2>Editar Task</h2>
        @csrf
        @method('PUT')
        <label for="task_title">Task Title:</label><br>
        <input type="text" id="task_title" name="task_title" value="{{ $task->title }}" required><br>
        <div>
            <input type="checkbox" id="completed" class="completed" name="completed" {{ $task->completed ? 'checked' : '' }}><br>
            <label for="completed">Concluida</label>
        </div>
        <button type="submit" class="button_primary">Atualizar</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var completedCheckbox = document.getElementById('completed');
            var taskForm = document.getElementById('task_form');

            completedCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    completedCheckbox.value = '1';
                } else {
                    completedCheckbox.value = '';
                }
            });

            taskForm.addEventListener('submit', function() {
                if (!completedCheckbox.checked) {
                    completedCheckbox.disabled = true;
                }
            });
        });
    </script>
</body>

</html>