<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class AuthorController extends Controller
{
    protected $rules = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'is_borrowed']);

        $authorsQuery = Author::query()
            ->withCount('books')
            ->search(Arr::get($filters, 'search', ''));

        $authors = $authorsQuery->paginate(5)
            ->appends(request()->query());

        return Inertia::render('Authors/Index', [
            'authors' => $authors,
            'filters' => $filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Authors/Compose');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);

        $author = Author::create($validated);

        return redirect()->route('authors.edit', $author)
            ->with('success', 'Author created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return Inertia::render('Authors/Compose', [
            'author' => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate($this->rules);

        $author->update($validated);

        return redirect()->route('authors.edit', $author)
            ->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted with all his books successfully.');
    }
}
