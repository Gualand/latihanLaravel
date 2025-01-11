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

        <hr>

        <h4>List Komentar</h4>
        <ul class="list-unstyled">
            @forelse ($post->komentar as $item)
            <li class="media mb-2">
              <img src="https://i.pravatar.cc/84" class="img-circle elevation-2" alt="User Image">
              <div class="media-body ml-3">
                <h5 class="mt-1 mb-1">{{ $item->user->name }}</h5>
                <p>{{ $item->name }}</p>
              </div>
            </li>
            @empty
                <div>Nothing comment here!</div>
            @endforelse
          </ul>
        <hr>
        <form action="/komentar/{{ $post->id }}" method="POST">
            @csrf
            <textarea name="name" class="form-control" placeholder="Masukan komentar!" cols="30" rows="10"></textarea>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
            <div class="d-flex justify-content-end mt-3">
                <input type="submit" value="Komentar" class="btn btn-warning">
            </div>
        </form>
        <a href="/post" class="btn btn-info btn-sm my-3">Back</a>
    </div>
  </div>
@endsection