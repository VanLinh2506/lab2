@extends('layouts.app')

@section('title', 'Sửa danh mục')

@section('content')
<h1>Sửa danh mục</h1>

<div class="card">
    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Tên danh mục *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            @if($category->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 200px; max-height: 200px; border-radius: 4px;">
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
            <a href="{{ route('categories.index') }}" class="btn">Hủy</a>
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
