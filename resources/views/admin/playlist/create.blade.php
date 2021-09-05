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
						<div class="card-title">Form Playlist Video</div>
						<a href="{{ route('playlist.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('playlist.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
                        <div class="form-group">
							<label for="judul">Playlist Video</label>
							<input type="text" class="form-control" name="judul_playlist">
						</div>
                        <div class="form-group">
							<label for="body">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="editor1"></textarea>
						</div>
                        {{--  <div class="form-group">
							<label for="user_id">User</label>
                            <select class="form-control" name="user_id">
                            @foreach ($user as $us)
                            <option value="{{ $us->id }}">{{ $us->name }}</option>
                            @endforeach
                            </select>
                        </div>  --}}
                        <div class="form-group">
							<label for="gambar_artikel">Gambar Playlist</label>
							<input type="file" class="form-control" name="gambar_playlist">
						</div>
                        <div class="form-group">
							<label for="is_active">Status</label>
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