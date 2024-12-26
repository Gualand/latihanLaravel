@extends('layout.master')

@section('pageName')
    Form Add Category
@endsection

@section('content')
<form action="/category" method="post">
    @csrf
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="categoryName">
      
      @error('categoryName')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
     <label>Description</label>
     <textarea name="categoryDescription" cols="30" rows="10" class="form-control"></textarea>

     @error('categoryDescription')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection