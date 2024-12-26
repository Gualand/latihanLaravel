@extends('layout.master')

@section('pageName')
    Detail Page Category
@endsection

@section('content')
<h1>{{ $detailCategory->categoryName }}</h1>
<p>{{ $detailCategory->categoryDescription }}</p>
<a href="/category" class="btn btn-info btn-sm">Back</a>
@endsection