@extends('layout.master')

@section('pageName')
    Detail Post Page
@endsection

@section('content')
<div class="card">
    <img src="{{ asset('images/' . $post->thumbnail) }}" class="card-img-top img-fluid" alt="...">
    <div class="card-body">
        <h1>{{ $post->postName }}</h1>
        <p class="card-text">{{ $post->content }}</p>
        <a href="/post" class="btn btn-info btn-sm">Back</a>
    </div>
  </div>
@endsection