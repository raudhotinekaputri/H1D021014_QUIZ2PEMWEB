<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <h1>Tugas</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Buat Tugas Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->judul }}</td>
                    <td>{{ $task->deskripsi }}</td>
                    <td>{{ $task->status ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('tasks.completed') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Tugas Sudah Selesai </button>
        </form>
        &nbsp;
        <form action="{{ route('tasks.uncomplete') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-dark">Tugas Belum Selesai </button>
        </form>

        <br>
        <h6>Raudhotin Eka Putri_H1D021014</h6>

    </div>

</body>

</html>
