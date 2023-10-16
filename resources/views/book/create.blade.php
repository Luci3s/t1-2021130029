@extends('layouts.template')

@section('title', 'Add New Book')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Book</h1>
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
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Halaman</label>
                    <input type="text" class="form-control" id="halaman" name="halaman" value="{{ old('halaman') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori" name="kategori">
                        <option {{ old('kategori') == 'uncategprized' ? 'selected' : '' }} value="uncategorized">Uncategorized</option>
                        <option {{ old('kategori') == 'sci-fi' ? 'selected' : '' }} value="sci-fi">Science Fiction</option>
                        <option {{ old('kategori') == 'novel' ? 'selected' : '' }} value="novel">Novel</option>
                        <option {{ old('kategori') == 'history' ? 'selected' : '' }} value="history">History</option>
                        <option {{ old('kategori') == 'biography' ? 'selected' : '' }} value="biography">Biography</option>
                        <option {{ old('kategori') == 'romance' ? 'selected' : '' }} value="romance">Romance</option>
                        <option {{ old('kategori') == 'education' ? 'selected' : '' }} value="education">Education</option>
                        <option {{ old('kategori') == 'culinary' ? 'selected' : '' }} value="culinary">Culinary</option>
                        <option {{ old('kategori') == 'comic' ? 'selected' : '' }} value="comic">Comic</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="title" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
                </div>
                {{-- <div class="mb-3 col-md-12 col-sm-12">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" rows="10" name="body">{{ old('body') }}</textarea>
                </div> --}}
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
