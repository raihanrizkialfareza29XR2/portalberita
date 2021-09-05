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
						<div class="card-title">Data Iklan</div>
					</div>
				</div>
				<div class="card-body">
					@if (Session::has('success'))
						<div class="alert alert-primary">
							{{ Session('success') }}
						</div>
					@endif
					<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Judul Iklan</th>
								<th>Link</th>
                                <th>Gambar</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($iklan as $row)
							<tr>
								<td>{{ $row->id }}</td>
								<td>{{ $row->judul_slide }}</td>
								<td>{{ $row->link }}</td>
                                <td>
                                    <img src="{{ asset('uploads/' . $row->gambar_iklan) }}" width="200">
                                </td>
								<td>
                                    @if ($row->status == '1')
                                    Active
                                    @else
                                    Draft
                                    @endif
                                </td>
								<td>
									<a href="{{ route('artikel.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="7" class="text-center">Data masih kosong!</td>
							</tr>
							@endforelse
							
						</tbody>
					<table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection