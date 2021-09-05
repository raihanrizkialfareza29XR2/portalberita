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
						<div class="card-title">Form Artikel</div>
						<a href="{{ route('artikel.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">
							<label for="judul">Judul Artikel</label>
							<input type="text" class="form-control" name="judul">
						</div>
						<div class="form-group">
							<label for="judul">Judul Di Halaman</label>
							<input type="text" class="form-control" name="judulhalaman">
						</div>
						<div class="form-group">
							<label for="judul">Nama Software</label>
							<input type="text" class="form-control" name="namaproduk">
						</div>
						<div class="form-group">
							<label for="judul">Tutorial</label>
							<input type="text" class="form-control" name="tutorial">
						</div>
						<div class="form-group">
							<label for="judul">Thumbnail</label>
							<input type="text" class="form-control" name="excerpt">
						</div>
						<div class="form-group">
							<label for="judul">Fitur</label>
							<input type="text" class="form-control" name="fitur">
						</div>
                        <div class="form-group">
							<label for="body">Body Artikel</label>
							<textarea class="form-control" name="body" id="editor1"></textarea>
						</div>
                        <div class="form-group">
							<label for="kategori_id">Kategori</label>
                            <select class="form-control" name="kategori_id">
                            @foreach ($kategori as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
							<label for="gambar_artikel">Gambar Artikel</label>
							<input type="file" class="form-control" name="gambar">
						</div>
                        <div class="form-group">
							<label for="is_active">Status Artikel</label>
							<select class="form-control" name="is_active">
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>
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