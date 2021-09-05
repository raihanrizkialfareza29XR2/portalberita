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
						<div class="card-title">Edit Materi {{ $materi->judul_materi }}</div>
						<a href="{{ route('materi.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
					</div>
				</div>
				
				<div class="card-body">
					<form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
                        @method('PUT')
                        <div class="form-group">
							<label for="judul">Judul Materi Video</label>
							<input type="text" class="form-control" name="judul_materi" value="{{ $materi->judul_materi }}">
						</div>
                        <div class="form-group">
							<label for="body">Deskripsi</label>
							<textarea class="form-control" name="deskripsi" id="editor1">{{ $materi->deskripsi }}</textarea>
						</div>
                        <div class="form-group">
							<label for="playlist_id">Playlist</label>
                            <select class="form-control" name="playlist_id">
                            @foreach ($playlist as $row)
                            @if ($row->id == $materi->playlist_id)
                            <option value={{ $row->id }} selected='selected'>{{ $row->judul_playlist }}</option>
                            @else
                            <option value="{{ $row->id }}">{{ $row->judul_playlist }}</option>
                            @endif
                            
                            
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
							<label for="is_active">Status Artikel</label>
							<select class="form-control" name="is_active">
                                <option value="1" {{ $materi->is_active == '1' ? 'selected' : '' }}>
                                    Publish
                                </option>
                                <option value="0" {{ $materi->is_active == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
						</div>
                        <div class="form-group">
							<label for="gambar_materi">Gambar</label>
							<input type="file" class="form-control" name="gambar_materi">
                            <br>
                            <label for="gambar">Gambar Saat Ini</label><br>
                            <img src=" {{ asset('uploads/' . $materi->gambar_materi) }} " width="400">
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