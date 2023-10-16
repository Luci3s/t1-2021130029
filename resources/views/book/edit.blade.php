@extends('layouts.template')

@section('title', 'Update Book')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Book</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('book.update', $book) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn"
                        value="{{ old('isbn', $book->isbn) }}" readonly>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Judul</label>
                    <input class="form-control" id=judul name="judul" value={{ old('judul', $book->judul) }}>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Halaman</label>
                    <input class="form-control" id=halaman name="halaman" value={{ old('body', $book->halaman) }}>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori">
                        <option {{ old('kategori', $book->kategori) == 'uncategprized' ? 'selected' : '' }} value="uncategorized">Uncategorized</option>
                        <option {{ old('kategori', $book->kategori) == 'sci-fi' ? 'selected' : '' }} value="sci-fi">Science Fiction</option>
                        <option {{ old('kategori', $book->kategori) == 'novel' ? 'selected' : '' }} value="novel">Novel</option>
                        <option {{ old('kategori', $book->kategori) == 'history' ? 'selected' : '' }} value="history">History</option>
                        <option {{ old('kategori', $book->kategori) == 'biography' ? 'selected' : '' }} value="biography">Biography</option>
                        <option {{ old('kategori', $book->kategori) == 'romance' ? 'selected' : '' }} value="romance">Romance</option>
                        <option {{ old('kategori', $book->kategori) == 'education' ? 'selected' : '' }} value="education">Education</option>
                        <option {{ old('kategori', $book->kategori) == 'culinary' ? 'selected' : '' }} value="culinary">Culinary</option>
                        <option {{ old('kategori', $book->kategori) == 'comic' ? 'selected' : '' }} value="comic">Comic</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Penerbit</label>
                    <input class="form-control" id=penerbit name="penerbit" value={{ old('body', $book->penerbit) }}>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
