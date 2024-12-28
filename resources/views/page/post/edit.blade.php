@extends('layout.master')

@section('pageName')
    Edit Post Page
@endsection

@section('content')
<form action="/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Judul Post</label>
      <input type="text" class="form-control" name="postName" value="{{ $post->postName }}">
      
      @error('postName')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
     <label>Post Content</label>
     <textarea name="content" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>

     @error('content')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">--Choose Category--</option>
            @forelse ($categories as $category)
                @if ($category->id === $post->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->categoryName }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endif   
            @empty
                <option value="">Nothing Category Yet!</option>
            @endforelse
        </select>
        
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror   
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" class="form-control" name="thumbnail">
        
        @error('thumbnail')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror   
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection