@extends('layouts.template')

@section('title', 'Add New Product')

@section('content')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Add New Product</h1>
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
        <form action="{{ route('shops.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-md-12 col-sm-12">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name') }}">
            </div>

            <div class="mb-3 col-md-12 col-sm-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3 col-md-6 col-sm-12">
                <label for="retail_price" class="form-label">Retail Price</label>
                <input type="number" step="0.01" class="form-control" id="retail_price" name="retail_price" value="{{ old('retail_price') }}">
            </div>

            <div class="mb-3 col-md-6 col-sm-12">
                <label for="wholesale_price" class="form-label">Wholesale Price</label>
                <input type="number" step="0.01" class="form-control" id="wholesale_price" name="wholesale_price" value="{{ old('wholesale_price') }}">
            </div>

            <div class="mb-3 col-md-12 col-sm-12">
                <label for="origin" class="form-label">Country of Origin</label>
                <input type="text" class="form-control" id="origin" name="origin" maxlength="2" value="{{ old('origin') }}" placeholder="e.g., ID for Indonesia">
            </div>

            <div class="mb-3 col-md-6 col-sm-12">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}">
            </div>

            <div class="mb-3 col-md-12 col-sm-12">
                <label for="product_img" class="form-label">Product Image</label>
                <input class="form-control" type="file" id="product_img" name="product_img">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
