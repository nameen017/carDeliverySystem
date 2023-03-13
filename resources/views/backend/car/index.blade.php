@extends('backend.layouts.master')
@section('title', 'List Car')

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
		      <i class="fa fa-align-justify"></i> List Car

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('car.create') }}" class="btn btn-primary btn-xs" title="Add Car">Add Car</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th>S.N</th>
		            <th>Name</th>
		            <th>Display Name</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>

						<tbody>

							<?php $items = ($cars->perPage() * ($cars->currentPage() - 1)); ?>

							@foreach($cars as $index => $car)
								<tr>
									<td>{{ ($items + $index + 1) }}</td>
									<td>{{ $car->name }}</td>
									<td>{{ $car->display_name }}</td>
									<td>
										<a href="{{ route('car.edit', $car->id) }}" class="btn btn-success btn-xs">Edit</a>
										<a href="{{ route('car.destroy', $car->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
									</td>
								</tr>
							@endforeach

						</tbody>
		      </table>
	      </div>

				<div class="card-footer">
					
					@if ($cars->total() > $cars->perPage())
						{!! $cars->links('backend.partials.paginator') !!}
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
