@extends('layouts.template')

@section('title', 'Products List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Products</h1>
        {{-- Add button --}}
        <a href="{{ route('shops.create') }}" class="btn btn-primary btn-sm">Add New Article</a>
    </div>
    <div class="container mt-4">
        <h1>Shop Products</h1>

        {{-- Informasi Harga Terbesar, Harga Terendah, dan Quantity Terbanyak --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="alert alert-info">
                    <strong>Harga Terbesar:</strong>
                    {{ $highestPrice->product_name }} (Rp {{ number_format($highestPrice->retail_price, 0, ',', '.') }})
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info">
                    <strong>Harga Terendah:</strong>
                    {{ $lowestPrice->product_name }} (Rp {{ number_format($lowestPrice->retail_price, 0, ',', '.') }})
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-info">
                    <strong>Quantity Terbanyak:</strong>
                    {{ $highestQuantity->product_name }} ({{ $highestQuantity->quantity }} pcs)
                </div>
            </div>
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
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Retail Price</th>
                        <th scope="col">Wholesale Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shops as $shop)
                        <tr>
                            <th scope="row">{{ $shop->id }}</th>
                            <td>{{ $shop->product_name }}</td>
                            <td>{{ Str::limit($shop->description, 50, ' ...') }}</td>
                            <!-- Format harga jika perlu -->
                            <td>{{ number_format($shop->retail_price, 0, ',', '.') }}</td>
                            <td>{{ number_format($shop->wholesale_price, 0, ',', '.') }}</td>
                            <td>{{ $shop->quantity }}</td>
                            <!-- Format tanggal agar lebih mudah dibaca -->
                            <td>{{ $shop->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $shop->updated_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('shops.edit', $shop) }}" class="btn btn-primary btn-sm">
                                    Edit
                                </a>
                            <form action="{{ route('shops.destroy', $shop) }}" method="POST"
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
                            <td colspan="6">No Products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {!! $shops->links() !!}
        </div>

    @endsection
