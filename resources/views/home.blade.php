<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <link rel="stylesheet" href="/css/home.css">
    <title>Gerenciador de Tarefas</title>

</head>

<body>
    <header>
        <div class="logo">
            <img src="/images/logo.png" alt="">
            <h1>Tarefas</h1>
        </div>
        <button class="button_primary" id="createTaskButton">
            Criar tarefa
            <i class="ph ph-plus-circle"></i>
        </button>
    </header>

    <main>
        <div class="card-header">
            <h1>
                Minhas Tarefas
            </h1>
        </div>
        <div class="tasks-container">
            <ul>
                @foreach ($tasks as $task)
                <li class="task-item">
                    <div class="left">

                        <label for="completed_{{ $task->id }}" class="completed-label"> <i class="ph ph-circle"></i></label>

                        <span>{{ $task->title }}</span>
                    </div>
                    <div class="right">
                        <a id="editTask" href="{{ route('tasks.edit', $task->id) }}"><i class="ph ph-pencil-simple"></i></a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button><i class="ph ph-trash"></i></button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        </div>
    </main>


    <div id="taskCreateModal" class="modal">
        <div class="modal-content">
            <span class="closeCreateModal">&times;</span>
            <div class="header-modal">
                <h2>Criar Tarefa</h2>
            </div>
            <div>
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <div>
                        <select name="category_id" require>
                            <option disabled default>Selecionar categoria</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span>ou</span>
                        <button type="button" class="new-category-button" onclick="newCreateCategory()">Criar nova
                            categoria</button>

                    </div>
                    <div>
                        <label for="task_title">Titulo da tarefa</label><br>
                        <input type="text" id="task_name" name="task_title" placeholder="titulo"><br><br>
                        <button type="submit" class="button_primary">Criar tarefa</button>
                    </div>

                </form>

                <form method="POST" action="{{ route('categories.store') }}" id="categoryForm">
                    @csrf
                    <label for="category_name">Nome da categoria:</label><br>
                    <input type="text" id="category_name" name="category_name"><br><br>
                    <button type="submit" class="button_primary">Criar Categoria</button>
                </form>
            </div>


        </div>
    </div>

    <script src="/home.js"></script>

</body>

</html>