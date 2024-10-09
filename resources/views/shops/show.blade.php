@extends('layouts.template')

@section('title', $shop->title)

@section('content')
<div class="container">
    <h1>{{ $shop->product_name }}</h1>
    <p>{{ $shop->description }}</p>
    <p><strong>Retail Price:</strong> Rp {{ number_format($shop->retail_price, 0, ',', '.') }}</p>
    <p><strong>Wholesale Price:</strong> Rp {{ number_format($shop->wholesale_price, 0, ',', '.') }}</p>
    <p><strong>Origin:</strong> {{ $shop->origin }}</p>
    <p><strong>Quantity:</strong> {{ $shop->quantity }}</p>
    @if($shop->product_img)
        <img src="{{ asset('storage/' . $shop->product_img) }}" alt="{{ $shop->product_name }}" class="img-fluid">
    @else
        <p>No image available</p>
    @endif
</div>
@endsection
