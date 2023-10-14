@extends('layouts.template')

@section('title', $book->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $book->isbn }}</h1>
        <p class="blog-post-meta">{{ $book->updated_at }}</p>
        <p>{{ $book->judul }}</p>
        <p>{{ $book->halaman }}</p>
        <p>{{ $book->penerbit }}</p>
    </article>
@endsection
