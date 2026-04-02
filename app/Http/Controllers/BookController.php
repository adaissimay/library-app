<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\Book::query();

    if ($request->has('search')) {
        $search = $request->get('search');
        $query->where('title', 'LIKE', "%{$search}%")
              ->orWhere('author', 'LIKE', "%{$search}%");
    }

    $books = $query->get();

    return view('books.index', compact('books'));
}
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|min:3|max:255',
        'author' => 'required',
        'year' => 'required|integer|min:100|max:' . date('Y'),
        'description' => 'nullable|string'
    ]);

    \App\Models\Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'year' => $request->year,
        'description' => $request->description,
    ]);

return redirect('/books')->with('success', 'Book added successfully!');}
public function destroy($id)
{
    $book = \App\Models\Book::findOrFail($id);

    $book->delete();

return redirect('/books')->with('success', 'Book deleted successfully!');}
public function edit($id)
{
    $book = \App\Models\Book::findOrFail($id);
    return view('books.edit', compact('book'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'author' => 'required',
        'year' => 'required|integer',
    ]);

    $book = \App\Models\Book::findOrFail($id);
    $book->update($request->all());

return redirect('/books')->with('success', 'Book updated successfully!');}
}
