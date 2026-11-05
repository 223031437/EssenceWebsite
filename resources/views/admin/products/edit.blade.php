@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gold" style="font-family:'Cormorant Garamond', serif;">Add New Product</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light">Back to Products</a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card p-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Basic Info -->
                        <div class="col-md-8 mb-3">
                            <label class="form-label text-secondary">Product Name</label>
                            <input type="text" name="name" class="form-control bg-dark text-white border-secondary" value="{{ old('name', $product->name) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Collection</label>
                            <select name="collection" class="form-select bg-dark text-white border-secondary" required>
                                <option value="" disabled>Select Collection</option>
                                <option value="Premium Collection" {{ old('collection', $product->collection) == 'Premium Collection' ? 'selected' : '' }}>Premium Collection</option>
                                <option value="Signature Scent" {{ old('collection', $product->collection) == 'Signature Scent' ? 'selected' : '' }}>Signature Scent</option>
                                <option value="Luxury Edition" {{ old('collection', $product->collection) == 'Luxury Edition' ? 'selected' : '' }}>Luxury Edition</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Category</label>
                            <select name="category" class="form-select bg-dark text-white border-secondary" required>
                                <option value="Men" {{ old('category', $product->category) == 'Men' ? 'selected' : '' }}>Men</option>
                                <option value="Ladies" {{ old('category', $product->category) == 'Ladies' ? 'selected' : '' }}>Ladies</option>
                                <option value="Unisex" {{ old('category', $product->category) == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Price ($)</label>
                            <input type="number" step="0.01" name="price" class="form-control bg-dark text-white border-secondary" value="{{ old('price', $product->price) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Stock Amount</label>
                            <input type="number" name="stock" class="form-control bg-dark text-white border-secondary" value="{{ old('stock', $product->stock) }}" required>
                        </div>
                    </div>

                    <!-- Fragrance Notes -->
                    <h5 class="text-gold mt-4 mb-3">Fragrance Notes</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Top Notes</label>
                            <input type="text" name="top_notes" class="form-control bg-dark text-white border-secondary" value="{{ old('top_notes', $product->top_notes) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Middle Notes</label>
                            <input type="text" name="middle_notes" class="form-control bg-dark text-white border-secondary" value="{{ old('middle_notes', $product->middle_notes) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label text-secondary">Base Notes</label>
                            <input type="text" name="base_notes" class="form-control bg-dark text-white border-secondary" value="{{ old('base_notes', $product->base_notes) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-secondary">Longevity</label>
                            <select name="longevity" class="form-select bg-dark text-white border-secondary" required>
                                <option value="Moderate" {{ old('longevity', $product->longevity) == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="Long" {{ old('longevity', $product->longevity) == 'Long' ? 'selected' : '' }}>Long</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-secondary">Update Image (Optional)</label>
                            <input type="file" name="image" class="form-control bg-dark text-white border-secondary" accept="image/*">
                            @if($product->image)
                                <small class="text-secondary mt-1 d-block">Current: {{ $product->image }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary">Description (Optional)</label>
                        <textarea name="description" rows="3" class="form-control bg-dark text-white border-secondary">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-gold w-100 mt-2">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection