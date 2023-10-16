@extends('layouts.template')

@section('title', 'Books List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Books</h1>
        <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm">Add New Book</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">ISBN</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Halaman</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->isbn }}</th>
                        <td>
                            <a href="{{ route('book.show', $book) }}">
                                {{ $book->judul }}
                            </a>
                        </td>
                        <td>{{ $book->halaman }}</td>
                        <td>

                        @switch($book->kategori)
                            @case('uncategorized')
                                Uncategorized
                                @break
                            @case('sci-fi')
                                Science Fiction
                                @break
                            @case('novel')
                                Novel
                                @break
                            @case('history')
                                History
                                @break
                            @case('biography')
                                Biography
                                @break
                            @case('romance')
                                Romance
                                @break
                            @case('education')
                                Education
                                @break
                            @case('culinary')
                                Culinary
                                @break
                            @case('comic')
                                Comic
                                @break
                            @default

                        @endswitch

                        </td>
                        <td>{{ $book->penerbit }}</td>
                        <td>{{ $book->created_at }}</td>
                        <td>{{ $book->updated_at }}</td>
                        <td>
                            <a href="{{ route('book.edit', $book) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('book.destroy', $book) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
            <div class="d-flex justify-content-center">
                {!! $books->links() !!}
            </div>
        </table>
    </div>
@endsection
