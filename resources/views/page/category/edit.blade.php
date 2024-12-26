@extends('layout.master')

@section('pageName')
    Edit Page Category
@endsection

@section('content')
<form action="/category/{{ $detailCategory->id }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="categoryName" value="{{ $detailCategory->categoryName }}">
      
      @error('categoryName')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
     <label>Description</label>
     <textarea name="categoryDescription" cols="30" rows="10" class="form-control">{{ $detailCategory->categoryDescription }}</textarea>

     @error('categoryDescription')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection