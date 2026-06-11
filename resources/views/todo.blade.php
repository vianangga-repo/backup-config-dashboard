<!DOCTYPE html>
<html>
<head>
    <title>My To-Do List</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding: 50px; }
        .container { width: 400px; }
        input[type="text"] { width: 70%; padding: 10px; }
        button { padding: 10px; cursor: pointer; }
        ul { list-style: none; padding: 0; }
        li { background: #f4f4f4; margin: 5px 0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>

        <!-- Form Tambah Tugas -->
        <form action="/tasks" method="POST">
            @csrf <!-- PENTING: Keamanan Laravel untuk mencegah serangan CSRF -->
            <input type="text" name="title" placeholder="Ketik tugas baru..." required>
            <button type="submit">Tambah</button>
        </form>

        <hr>

        <!-- Daftar Tugas -->
        <ul>
            @foreach($tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>