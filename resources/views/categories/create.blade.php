@extends('layouts.app')

@section('title', 'Thêm danh mục mới')

@section('content')
<h1>Thêm danh mục mới</h1>

<div class="card">
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Tên danh mục *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)">
            @error('image')
                <span style="color: red; font-size: 14px;">{{ $message }}</span>
            @enderror
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-success">Lưu</button>
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
            preview.innerHTML = '<img src="' + e.target.result + '" style="max-width: 200px; max-height: 200px; border-radius: 4px;">';
        }
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
}
</script>
@endsection
