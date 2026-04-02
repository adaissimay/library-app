<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - {{ $book->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Edit Book Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="/books/{{ $book->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Book Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Author</label>
                                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Year of Publication</label>
                                <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $book->description }}</textarea>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/books" class="btn btn-outline-secondary">Cancel & Go Back</a>
                                <button type="submit" class="btn btn-success px-4">Update Book Information</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
</body>
</html>