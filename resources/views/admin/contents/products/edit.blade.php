@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Use PUT method for updating --}}
        
        <div class="row">
            <div class="form-group col-md-6">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $product->title) }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="slug">Slug</label>
                <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug', $product->slug) }}" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="sale_price">Sale Price</label>
                <input type="number" step="0.01" name="sale_price" class="form-control" id="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5" required>{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="draft" {{ $product->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $product->status === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ $product->status === 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label for="sku">SKU</label>
                <input type="text" name="sku" class="form-control" id="sku" value="{{ old('sku', $product->sku) }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="stock_quantity">Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-control" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
            </div>

            <div class="form-group col-md-4">
                <label for="weight">Weight In Grams</label>
                <input type="number" step="0.01" name="weight" class="form-control" id="weight" value="{{ old('weight', $product->weight) }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="dimensions">Dimensions</label>
                <input type="text" name="dimensions" class="form-control" id="dimensions" value="{{ old('dimensions', $product->dimensions) }}">
            </div>

            <div class="form-group col-md-6">
                <label for="image">Featured Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="meta_description">Meta Description</label>
                <input type="text" name="meta_description" class="form-control" id="meta_description" value="{{ old('meta_description', $product->meta_description) }}">
            </div>

            <div class="form-group col-md-6">
                <label for="meta_keywords">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
