@extends('backend.layouts.master')
@section('title', 'List Zone')

@section('after-head')
	<meta name="_token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('backend/dataTable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
	<!-- Content Header (Page header) -->
	<div class="content-header"></div>
	<!-- /.content-header -->
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-12">
			<div class="card">
		    <div class="card-header">
		      <i class="fa fa-align-justify"></i> List Zone

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('zone.create') }}" class="btn btn-primary btn-xs" title="Add Zone">Add Zone</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th>S.N</th>
		            <th>Name</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>

						<tbody>

							<?php $items = ($zones->perPage() * ($zones->currentPage() - 1)); ?>

							@foreach($zones as $index => $zone)
								<tr>
									<td>{{ ($items + $index + 1) }}</td>
									<td>{{ $zone->name }}</td>
									<td>
										<a href="{{ route('zone.edit', $zone->id) }}" class="btn btn-success btn-xs">Edit</a>
										<a href="{{ route('zone.destroy', $zone->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
									</td>
								</tr>
							@endforeach

						</tbody>
		      </table>
	      </div>

				<div class="card-footer">
					
					@if ($zones->total() > $zones->perPage())
						{!! $zones->links('backend.partials.paginator') !!}
					@else
						<div class="card-footer clearfix">
							<ul class="pagination pagination-sm m-0 float-right">
								<li class="page-item"><a class="page-link">«</a></li>
								<li class="page-item"><a class="page-link">1</a></li>
								<li class="page-item"><a class="page-link">»</a></li>
							</ul>
						</div>
					@endif

				</div>
		  </div>
		</div>
	</div>
@endsection
