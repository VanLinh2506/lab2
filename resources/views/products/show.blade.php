@extends('layouts.app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Chi tiết sản phẩm</h1>
    <div class="actions">
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Sửa</a>
        <a href="{{ route('products.index') }}" class="btn">Quay lại</a>
    </div>
</div>

<div class="card">
    @if($product->image)
        <div class="form-group">
            <label>Hình ảnh:</label>
            <div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 400px; max-height: 400px; border-radius: 8px;">
            </div>
        </div>
    @endif

    <div class="form-group">
        <label>Tên sản phẩm:</label>
        <p>{{ $product->name }}</p>
    </div>

    <div class="form-group">
        <label>Danh mục:</label>
        <p>
            <a href="{{ route('categories.show', $product->category) }}" style="color: #007bff;">
                {{ $product->category->name }}
            </a>
        </p>
    </div>

    <div class="form-group">
        <label>Giá:</label>
        <p>{{ number_format($product->price, 0, ',', '.') }} đ</p>
    </div>

    <div class="form-group">
        <label>Số lượng:</label>
        <p>{{ $product->quantity }}</p>
    </div>

    <div class="form-group">
        <label>Mô tả:</label>
        <p>{{ $product->description ?? 'Không có mô tả' }}</p>
    </div>

    <div class="form-group">
        <label>Ngày tạo:</label>
        <p>{{ $product->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="form-group">
        <label>Cập nhật lần cuối:</label>
        <p>{{ $product->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>
@endsection
