<!DOCTYPE html>
<html>
<head>
    <title>Detail Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Detail Tugas</h1>

        <div class="card">
            <div class="card-header">
                Task ID: {{ $task->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Judul: {{ $task->judul }}</h5>
                <p class="card-text">Deskripsi: {{ $task->deskripsi }}</p>
                <p class="card-text">Status: {{ $task->status ? 'Selesai' : 'Belum Selesai' }}</p>
            </div>
        </div>

        <form action="{{ route('tasks.update-status', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Selesai" {{ $task->status ? 'selected' : '' }}>Selesai</option>
                    <option value="Belum Selesai" {{ !$task->status ? 'selected' : '' }}>Belum Selesai</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
        
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Kembali Ke List Tugas</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
