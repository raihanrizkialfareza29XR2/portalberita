@extends('front.layouts.frontend')
@section('content')
<div class="container">
    <div class="row">
      @foreach ($artikel as $row)
      <div class="card col-sm-3 artikel">
        <img src="{{ asset('uploads/' . $row->gambar) }}" class="card-img-top gambar d-block mx-auto">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $row->judul }}</h5>
          <p class="card-text"></p>
          <a href="{{ route('detail', $row->slug )}}" class="btn btn-primary d-flex justify-content-center">Go somewhere</a>
        </div>
      </div>
      @endforeach
   </div>
 </div>
 @endsection