@extends('layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Thêm sản phẩm mới</a>
</div>

<div class="card" style="margin-bottom: 20px;">
    <form action="{{ route('products.index') }}" method="GET">
        <div style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Tìm kiếm sản phẩm theo tên, mô tả hoặc danh mục..." value="{{ $search ?? '' }}" style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            <button type="submit" class="btn">Tìm kiếm</button>
            @if($search)
                <a href="{{ route('products.index') }}" class="btn" style="background: #6c757d;">Xóa lọc</a>
            @endif
        </div>
    </form>
</div>

<div class="card">
    @if($search)
        <p style="margin-bottom: 15px; color: #666;">Tìm thấy {{ $products->count() }} kết quả cho "{{ $search }}"</p>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #6c757d;">No image</div>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('products.show', $product) }}" class="btn">Xem</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">
                    @if($search)
                        Không tìm thấy sản phẩm nào phù hợp
                    @else
                        Chưa có sản phẩm nào
                    @endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
