@extends('layout.master')

@section('pageName')
    Detail Page Category
@endsection

@section('content')
<h1>{{ $detailCategory->categoryName }}</h1>
<p>{{ $detailCategory->categoryDescription }}</p>


<div class="row">
    @forelse ($detailCategory->posts as $item)
        <div class="col-6">
            <div class="">
                <div class="card mb-3">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="{{ asset('images/' . $item->thumbnail) }}" alt="Post Image" class="img-fluid" style="height: 100%">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h3 class="card-title text-bold">{{ $item->postName }}</h3>
                          <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                          <p class="card-text"><small class="text-muted">Created at : {{ $item->created_at }}</small></p>
                          <a href="/post/{{ $item->id }}" class="btn btn-warning btn-sm mb-2">Details</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h1>Tidak ada postingan</h1>
    @endforelse
</div>

<a href="/category" class="btn btn-info btn-sm mt-3">Back</a>
@endsection