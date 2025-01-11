@extends('layout.master')

@section('pageName')
    Edit Profile
@endsection

@section('content')
<form action="/profile/{{ $profile->id }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Nama User</label>
      <input type="text" class="form-control" name="name" value="{{ $profile->user->name }}" disabled>
      
      @error('age')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
      <label>Umur</label>
      <input type="number" class="form-control" name="age" value="{{ $profile->age }}">
      
      @error('age')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror   
    </div>
    <div class="form-group">
     <label>Biodata</label>
     <textarea name="bio" cols="30" rows="10" class="form-control">{{ $profile->bio }}</textarea>

     @error('bio')
     <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    </div>
    <div class="form-group">
        <label>Photo Profile</label>
        <input type="file" class="form-control" name="photoProfile">
        
        @error('photoProfile')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror   
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection