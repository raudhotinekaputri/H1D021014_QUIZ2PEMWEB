<!DOCTYPE html>
<html>
<head>
    <title>Tugas Belum Selesai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tugas Belum Selesai</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uncompleteTasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->judul }}</td>
                    <td>{{ $task->deskripsi }}</td>
                    <td>{{ $task->status ? 'Selesai' : 'Belum Selesai' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
