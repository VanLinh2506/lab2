@extends('layouts.app')

@section('title', 'Danh sách danh mục')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Danh sách danh mục</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Thêm danh mục mới</a>
</div>

<div class="card" style="margin-bottom: 20px;">
    <form action="{{ route('categories.index') }}" method="GET">
        <div style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Tìm kiếm danh mục..." value="{{ $search ?? '' }}" style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            <button type="submit" class="btn">Tìm kiếm</button>
            @if($search)
                <a href="{{ route('categories.index') }}" class="btn" style="background: #6c757d;">Xóa lọc</a>
            @endif
        </div>
    </form>
</div>

<div class="card">
    @if($search)
        <p style="margin-bottom: 15px; color: #666;">Tìm thấy {{ $categories->count() }} kết quả cho "{{ $search }}"</p>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Số sản phẩm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                    @else
                        <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #6c757d;">No image</div>
                    @endif
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ Str::limit($category->description, 50) }}</td>
                <td>{{ $category->products->count() }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('categories.show', $category) }}" class="btn">Xem</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa danh mục này?\n\nLưu ý: Tất cả {{ $category->products->count() }} sản phẩm trong danh mục này cũng sẽ bị xóa!')">Xóa</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">
                    @if($search)
                        Không tìm thấy danh mục nào phù hợp
                    @else
                        Chưa có danh mục nào
                    @endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
