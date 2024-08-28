<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    protected $rules = [
        'title' => 'required|string|max:255',
        'author_id' => 'required|exists:authors,id',
        'is_borrowed' => 'boolean',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Books/Index', [
            'books' => Book::with('author')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();

        return Inertia::render('Books/Compose', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);

        $book = Book::create($validated);

        return redirect()->route('books.edit', $book)
            ->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();

        return Inertia::render('Books/Compose', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate($this->rules);

        $book->update($validated);

        return redirect()->route('books.edit', $book)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function toggleBorrowed(Book $book)
    {
        $book->is_borrowed = !$book->is_borrowed;
        $book->save();

        return redirect()->back()
            ->with('success', 'Book status updated successfully.');
    }
}
