<!DOCTYPE html>
<html>
<head>
    <title>Add Task - Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>Add New Task</h1>
            <p>Create a new task for your Task Manager.</p>
        </div>

    </div>


    <div class="form-card">

        <form
            action="{{ route('tasks.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="Enter task name"
                    required
                >

                @error('task_name')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    required
                >

                    <option value="Pending">
                        Pending
                    </option>

                    <option value="Completed">
                        Completed
                    </option>

                </select>

                @error('status')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>


            <div class="form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date') }}"
                >

                @error('due_date')
                    <p class="error">{{ $message }}</p>
                @enderror

            </div>


            <button
                type="submit"
                class="submit-button"
            >
                Add Task
            </button>


            <a
                href="{{ route('tasks.index') }}"
                class="back-link"
            >
                ← Back to Tasks
            </a>

        </form>

    </div>

</div>

</body>
</html>