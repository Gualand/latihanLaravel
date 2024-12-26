@extends('layout.master')

@section('pageName')
    List of Categories
@endsection

@section('content')
<a href="/category/create" class="btn btn-info btn-sm mb-3">Add Category</a>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->categoryName }}</td>
            <td>
                <form action="/category/{{ $category->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/category/{{ $category->id }}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="/category/{{ $category->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td class="d-flex justify-content-center">Category is empty</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection