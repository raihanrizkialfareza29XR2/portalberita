@extends('front.layouts.frontend')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="#">{{ $artikel->kategori->nama_kategori }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
    </ol>
  </nav>
    <br>
<div class="row">
    <div class="col-lg-8 mt-4">
        <img src="{{ asset('uploads/' . $artikel->gambar) }}" width="800" class="d-block mx-auto">
        <br>
        <div class="container teks">
            <h3 class="judulteks">{{ $artikel->judulhalaman }}</h2>
            {{-- <p class="teksnya">{!! $artikel->body !!}</p> --}}
            {!! $artikel->body !!}
            <br>
            <img src="{{ asset('uploads/' . $artikel->gambar) }}" width="800" class="d-block mx-auto">
            <br>
            <h3 class="tekshitam">Fitur {{ $artikel->namaproduk }}</h3>
            <ul>
                <li class="fitur">{{ $artikel->fitur }}</li>
            </ul>
            <br>
            <h3 class="tekshitam">Cara Install {{ $artikel->namaproduk }} Gratis :</h3>
            <ol>
                <li class="tutorial">{{ $artikel->tutorial }}</li>
            </ol>
            <br>
            <h6>Catatan :</h6>
            <ul>
                <li>Bla Bla</li>
                <li>Bla Bla</li>
            </ul>
            <br>
            <div class="alert alert-primary">
                <h4 class="wajib">Wajib Download Juga : <a href="#">Adobe</a></h4>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-lg-4 mt-4">
        <div class="sidebar-download">
            <h4>Cara Download Aplikasi</h4>
            <hr>
            <img src="{{ asset('/uploads/' . $artikel->gambar) }}" width="300">
            <br>
            <br>
            <a href="#">
                <h5>Cara download software</h5>
            </a>
        </div>
        <br>
        <div class="sidebar-kategori">
            <h4>Kategori</h4>
            <hr>
            @foreach ($kategori as $row)
            <div class="kategorinya d-flex flex-wrap">
                <a href="" style="text-decoration: none;">
                    <p>{{ $row->nama_kategori }}</p>
                </a>
                <p class="ml-auto text-right"><span class="badge badge-dark">{{ $row->artikel->count() }}</span></p>
            </div>
            @endforeach
        </div>
        <div class="sidebar-new-artikel">
            <h4>Artikel Terbaru</h4>
            <hr>
            @foreach ($postinganterbaru as $row)
                <div class="media">
                    <img src="{{ asset('/uploads/' . $row->gambar) }}" class="mr-3" width="80">
                    <div class="media-body">
                    <a href="{{ route('detail', $row->slug) }}"><h6 class="newart">{{ $row->judul }}</h6></a>
                    </div>
              </div>
            @endforeach
        </div>
    </div>
</div>
@endsection