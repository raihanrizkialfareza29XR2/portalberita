@extends('front.layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      {{--  @foreach ($kategori as $row)
      <div class="card col-sm-3 artikel">
        <img src="{{ asset('uploads/' . $row->artikel->gambar) }}" class="card-img-top gambar d-block mx-auto">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $row->artikel->judul }}</h5>
          <p class="card-text"></p>
          <a href="{{ route('detail', $row->artikel->slug )}}" class="btn btn-primary d-flex justify-content-center">Go somewhere</a>
        </div>
      </div>
      @endforeach  --}}
      <div class="card col-sm-3 artikel">
        <img src="{{ asset('uploads/' . $kategori->artikel->gambar) }}" class="card-img-top gambar d-block mx-auto">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $kategori->artikel->judul }}</h5>
          <p class="card-text"></p>
          <a href="{{ route('detail', $kategori->artikel->slug )}}" class="btn btn-primary d-flex justify-content-center">Go somewhere</a>
        </div>
      </div>
   </div>
 </div>
 @endsection