@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit Artikel {{ $artikel->judul }}</div>
						<a href="{{ route('artikel.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
                        <div class="form-group">
							<label for="judul">Judul Artikel</label>
							<input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}">
						</div>
						<div class="form-group">
							<label for="judul">Judul Di Halaman</label>
							<input type="text" class="form-control" name="judulhalaman" value="{{ $artikel->judulhalaman }}">
						</div>
						<div class="form-group">
							<label for="judul">Nama Software</label>
							<input type="text" class="form-control" name="namaproduk" value="{{ $artikel->namaproduk }}">
						</div>
						<div class="form-group">
							<label for="judul">Tutorial</label>
							<input type="text" class="form-control" name="tutorial" value="{{ $artikel->tutorial }}">
						</div>
						<div class="form-group">
							<label for="judul">Judul Artikel</label>
							<input type="text" class="form-control" name="excerpt" value="{{ $artikel->excerpt }}">
						</div>
						<div class="form-group">
							<label for="judul">Judul Artikel</label>
							<input type="text" class="form-control" name="fitur" value="{{ $artikel->fitur }}">
						</div>
                        <div class="form-group">
							<label for="body">Body Artikel</label>
							<textarea class="form-control" name="body" id="editor1">{{ $artikel->body }}</textarea>
						</div>
                        <div class="form-group">
							<label for="kategori_id">Kategori</label>
                            <select class="form-control" name="kategori_id">
                            @foreach ($kategori as $row)
                            @if ($row->id == $artikel->kategori_id)
                            <option value={{ $row->id }} selected='selected'>{{ $row->nama_kategori }}</option>
                            @else
                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endif
                            
                            
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
							<label for="is_active">Status Artikel</label>
							<select class="form-control" name="is_active">
                                <option value="1" {{ $artikel->is_active == '1' ? 'selected' : '' }}>
                                    Publish
                                </option>
                                <option value="0" {{ $artikel->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
						</div>
                        <div class="form-group">
							<label for="gambar_artikel">Gambar Artikel</label>
							<input type="file" class="form-control" name="gambar">
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src=" {{ asset('uploads/' . $artikel->gambar) }} " width="400">
						</div>
						<div class="form-group">
						<button class="btn btn-primary btn-sm" type="submit">Save</button>
						<button class="btn btn-danger btn-sm" type="reset">Reset</button>
						</div>
				</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection