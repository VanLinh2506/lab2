@extends('layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
<h1>Sửa sản phẩm</h1>

<div class="card">
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Tên sản phẩm *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục *</label>
            <select name="category_id" id="category_id" required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Giá *</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" required>
            @error('price')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Số lượng *</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
            @error('quantity')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            @if($product->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px; max-height: 200px; border-radius: 4px;">
                    <p style="font-size: 12px; color: #666; margin-top: 5px;">Ảnh hiện tại</p>
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
            @error('image')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('products.index') }}" class="btn">Hủy</a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = '<img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px; border-radius: 4px;"><p style="font-size: 12px; color: #666; margin-top: 5px;">Ảnh mới</p>';
        }
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
}
</script>
@endsection
