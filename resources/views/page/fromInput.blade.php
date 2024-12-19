@extends('layout.master')

@section('pageName')
    Input Data
@endsection

@section('content')
    <form action="/kirimData" method="post">
        @csrf
        <label for="name">Nama :</label><br>
        <input type="text" name="name"><br><br>
        <label for="address">Alamat :</label><br>
        <textarea name="address"></textarea><br><br>
        <input type="submit" value="Kirim">
    </form>
@endsection