@extends('layouts.template')

@section('title', 'Update Products')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Products</h1>
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
            <form action="{{ route('shops.update', $shop) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        value="{{ old('product_name', $shop->product_name) }}">
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="retail_price" class="form-label">Retail Price</label>
                    <input type="number" class="form-control" id="retail_price" name="retail_price"
                        value="{{ old('retail_price', $shop->retail_price) }}" step="0.01">
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="wholesale_price" class="form-label">Wholesale Price</label>
                    <input type="number" class="form-control" id="wholesale_price" name="wholesale_price"
                        value="{{ old('wholesale_price', $shop->wholesale_price) }}" step="0.01">
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" rows="10" name="description">{{ old('description', $shop->description) }}</textarea>
                </div>

                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" name="image">
                    @if ($shop->product_img)
                        <img src="/storage{{ $shop->product_img }}" class="mt-3" style="max-width: 400px;">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
