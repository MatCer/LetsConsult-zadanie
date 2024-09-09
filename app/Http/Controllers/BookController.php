<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class BookController extends Controller
{
    protected array $rules = [
        'title' => 'required|string|max:255',
        'author_id' => 'required|exists:authors,id',
        'is_borrowed' => 'boolean',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Inertia\Response
    {
        $filters = $request->only(['search', 'is_borrowed']);

        $booksQuery = Book::query()
            ->with('author')
            ->search(Arr::get($filters, 'search', ''));

        $isBorrowed = Arr::get($filters, 'is_borrowed');
        if (!is_null($isBorrowed)) {
            $booksQuery->where('is_borrowed', $isBorrowed === '1');
        }

        $books = $booksQuery->paginate(5)
            ->appends(request()->query());

        return Inertia::render('Books/Index', [
            'books' => $books,
            'filters' => $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        $authors = Author::all();

        return Inertia::render('Books/Compose', [
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate($this->rules);

        $book = Book::create($validated);

        return redirect()->route('books.edit', $book)
            ->with('success', 'Book created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): \Inertia\Response
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
    public function update(Request $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate($this->rules);

        $book->update($validated);

        return redirect()->route('books.edit', $book)
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): \Illuminate\Http\RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function toggleBorrowed(Book $book): \Illuminate\Http\RedirectResponse
    {
        $book->is_borrowed = !$book->is_borrowed;
        $book->save();

        return redirect()->back()
            ->with('success', 'Book status updated successfully.');
    }
}
