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
						<div class="card-title">Edit Kategori <i>{{ $kategori->nama_kategori }}</i> </div>
						<a href="{{ route('kategori.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
						@csrf
                        @method('PUT')
						<div class="form-group">
							<label for="nama_kategori">Nama Kategori</label>
							<input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" id="nama_kategori">
						</div>
						<div class="form-group">
						<button class="btn btn-primary btn-sm" type="submit">Save</button>
						</div>
				</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection