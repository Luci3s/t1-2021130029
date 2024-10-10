@extends('layouts.template')

@section('title', 'Landing Page')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Selamat Datang di Supermarket kami!</h1>
            <p class="lead my-3">Dimana kalian mendapatkan barang-barang atau products yang kalian butuhkan!</p>
        </div>
    </div>

    {{-- Shopss Card --}}
    <div class="row mb-2">
        @forelse ($shops as $shop)
            <div class="col-md-6">
                <div class="row sg-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Products</strong>
                        <h3 class="mb-0">{{ $shop->product_name }}</h3>

                        <!-- Display wholesale and retail price -->
                        <p class="mb-1">
                            <strong>Wholesale Price: </strong>Rp {{ number_format($shop->wholesale_price, 0, ',', '.') }}
                        </p>
                        <p class="mb-1">
                            <strong>Retail Price: </strong>Rp {{ number_format($shop->retail_price, 0, ',', '.') }}
                        </p>

                        <!-- Replace body with description -->
                        <p class="card-text mb-auto">
                            {{ Str::limit($shop->description, 50, ' ...') }}
                        </p>
                        <a href="{{ route('shops.show', $shop->id) }}" class="btn btn-primary">Continue Product</a> <!-- Link untuk melanjutkan ke detail produk -->
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        @if ($shop->product_img)
                            <img src="/storage/{{ $shop->product_img }}" alt="image" width="200" height="250">
                        @else
                            <img src="https://via.placeholder.com/200x250" width="200" height="250">
                        @endif
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h2 class="card-text mb-auto">No Products found.</h2>
                    </div>
                </div>
            </div>
        @endforelse

        {{ $shops->links() }}
    </div>
@endsection
