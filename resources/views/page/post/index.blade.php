@extends('layout.master')

@section('pageName')
    List of Post 
@endsection

@section('content')
@auth
  <a href="/post/create" class="btn btn-info btn-sm mb-3">Add Post</a>    
@endauth

<div class="row">
    @forelse ($post as $item)
    <div class="col-6">
        <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="{{ asset('images/' . $item->thumbnail) }}" alt="Post Image" class="img-fluid" style="height: 100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h3 class="card-title text-bold">{{ $item->postName }}</h3>
                  <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                  <span class="badge badge-success">{{ $item->category->categoryName }}</span>
                  <p class="card-text"><small class="text-muted">Created at : {{ $item->created_at }}</small></p>
                  <a href="/post/{{ $item->id }}" class="btn btn-warning btn-sm mb-2">Details</a>
                  @auth
                    <form action="/post/{{ $item->id }}" method="POST">
                      @csrf
                      @method('delete')
                      <a href="post/{{ $item->id }}}/edit" class="btn btn-info btn-sm">Edit</a>
                      <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>    
                  @endauth
                </div>
              </div>
            </div>
        </div>
    </div>
    @empty
        <h3>Nothing post yet!</h3>
    @endforelse
</div>

@endsection