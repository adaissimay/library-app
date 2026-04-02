<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Library Management</h2>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addBookModal">
                    + Add New Book
                </button>
            </div>
            <div class="card-body">
<h1>My Library</h1>
<form action="/books" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" placeholder="Search by title or author..." value="{{ request('search') }}">
    <button type="submit" style="background-color: #3498db;">Search</button>
    <a href="/books" style="text-decoration: none; margin-left: 10px;">Clear</a>
</form>
<fieldset>
    <legend>Add New Book</legend>
   <div class="card mb-4 border-primary">
    <div class="card-body">
        <h5 class="card-title">Register a New Book</h5>
        <form action="/books" method="POST" class="row g-3">
            @csrf
            <div class="col-md-4">
                <input type="text" name="title" class="form-control" placeholder="Book Title" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="author" class="form-control" placeholder="Author" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="year" class="form-control" placeholder="Year" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Save Book</button>
            </div>
            <div class="col-12">
                <textarea name="description" class="form-control" placeholder="Enter description..."></textarea>
            </div>
        </form>
    </div>
</div>
</fieldset>

<br>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<table class="table table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($books as $book)
        <tr>
            <td><strong>{{ $book->title }}</strong></td>
            <td>{{ $book->author }}</td>
            <td><span class="badge bg-secondary">{{ $book->year }}</span></td>
            <td>{{ $book->description }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="/books/{{ $book->id }}/edit" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="/books/{{ $book->id }}" method="POST" onsubmit="return confirm('Delete this book?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-4 text-muted">
                <i class="bi bi-book"></i> No books found in the library. Start by adding one above!
            </td>
        </tr>
    @endforelse
</tbody>
</table>
</div> </div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>