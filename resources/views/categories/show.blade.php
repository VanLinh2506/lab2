@extends('layouts.app')

@section('title', 'Chi tiết danh mục')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Chi tiết danh mục</h1>
    <div class="actions">
        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Sửa</a>
        <a href="{{ route('categories.index') }}" class="btn">Quay lại</a>
    </div>
</div>

<div class="card">
    @if($category->image)
        <div class="form-group">
            <label>Hình ảnh:</label>
            <div>
                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 300px; max-height: 300px; border-radius: 8px;">
            </div>
        </div>
    @endif

    <div class="form-group">
        <label>Tên danh mục:</label>
        <p>{{ $category->name }}</p>
    </div>

    <div class="form-group">
        <label>Mô tả:</label>
        <p>{{ $category->description ?? 'Không có mô tả' }}</p>
    </div>

    <div class="form-group">
        <label>Ngày tạo:</label>
        <p>{{ $category->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="form-group">
        <label>Cập nhật lần cuối:</label>
        <p>{{ $category->updated_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<h2 style="margin-top: 30px; margin-bottom: 15px;">Sản phẩm trong danh mục ({{ $category->products->count() }})</h2>
<div class="card">
    @if($category->products->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 50px; height: 50px; background: #e9ecef; border-radius: 4px;"></div>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn">Xem</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center; color: #666;">Chưa có sản phẩm nào trong danh mục này</p>
    @endif
</div>
@endsection
