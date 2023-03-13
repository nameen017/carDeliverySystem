@extends('backend.layouts.master')
@section('title', 'List Customer')

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
		      <i class="fa fa-align-justify"></i> List Customer

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('customer.create') }}" class="btn btn-primary btn-xs" title="Add Customer">Add Customer</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th>S.N</th>
		            <th>Name</th>
		            <th>Location</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>

						<tbody>

							<?php $sn = 1; ?>
							@foreach($customers as $index => $customer)
								<tr>
									<td>{!! $sn++ !!}</td>
									<td>{!! $customer->name !!}</td>
									<td>{!! $customer->zone->name.', '. $customer->location->name !!}</td>
									<td>
										<a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-success btn-xs">Edit</a>
										<a href="{{ route('customer.destroy', $customer->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
									</td>
								</tr>

							@endforeach

						</tbody>
		      </table>
	      </div>

				<div class="card-footer">
					
					@if ($customers->total() > $customers->perPage())
						{!! $customers->links('backend.partials.paginator') !!}
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
