@extends('layout.master')

@section('pageName')
    Add Post Page
@endsection

@section('content')
<form action="/post" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Judul Post</label>
      <input type="text" class="form-control" name="postName">
      
      @error('postName')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
     <label>Post Content</label>
     <textarea name="content" cols="30" rows="10" class="form-control"></textarea>

     @error('content')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">--Choose Category--</option>
            @forelse ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
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