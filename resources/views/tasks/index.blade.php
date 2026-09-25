<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Task Manager</h1>
            <p>Keep track of your tasks and deadlines.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add Task
        </a>

    </div>


    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    @forelse($tasks as $task)

        <div class="task-card">

            <div class="task-main">

                <div>
                    <h2>
                        {{ $task->task_name }}
                    </h2>

                    <p class="description">
                        {{ $task->description ?? 'No description provided.' }}
                    </p>
                </div>


                <div class="task-status">

                    @if($task->status == 'Completed')

                        <span class="status completed">
                            Completed
                        </span>

                    @else

                        <span class="status pending">
                            Pending
                        </span>

                    @endif

                </div>

            </div>


            <div class="task-footer">

                <div class="task-date">
                    📅 Due:
                    {{ $task->due_date ?? 'No due date' }}
                </div>


                <div class="actions">

                    <a
                        href="{{ route('tasks.edit', $task->id) }}"
                        class="edit-button"
                    >
                        Edit
                    </a>


                    <form
                        action="{{ route('tasks.destroy', $task->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this task?')"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="empty">

            <h2>No Tasks Yet</h2>

            <p>
                You don't have any tasks right now.
            </p>

            <a
                href="{{ route('tasks.create') }}"
                class="add-button"
            >
                Create Your First Task
            </a>

        </div>

    @endforelse

</div>

</body>
</html>