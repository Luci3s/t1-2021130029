<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('book.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|unique:book|size:13',
            'judul' => 'required',
            'halaman' => 'required|integer|min:0',
            'kategori' => 'required',
            'penerbit' => 'required'
        ]);

        $book = Book::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'halaman' => $request->halaman,
            'kategori' => $request->kategori,
            'penerbit' => $request->penerbit,
        ]);

        return redirect()->route('book.index')->with('success', 'Buku telah berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'halaman' => 'required|integer|min:0',
            'kategori' => 'required',
            'penerbit' => 'required'
        ]);

        $book->update([
            'judul' => $validated['judul'],
            'halaman' => $validated['halaman'],
            'kategori' => $validated['kategori'],
            'penerbit' => $validated['penerbit'],
        ]);
        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
