@extends('backend.layouts.master')
@section('title', 'List Delivery Transaction')

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
		      <i class="fa fa-align-justify"></i> List Delivery Transaction

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('delivery-transaction.create') }}" class="btn btn-primary btn-xs" title="Add Delivery Transaction">Add Delivery Transaction</a>
						</div>
					</div>
		    </div>

		    <div class="card-body">
		      <table class="table table-responsive-sm table-sm" id="myTable">
		        <thead>
		          <tr>
		            <th>S.N</th>
		            <th>Customer</th>
		            <th>Location</th>
		            <th>Car</th>
		            <th>Car Model</th>
		            <th width="15%">Action</th>
		          </tr>
		        </thead>

						<tbody>

							<?php $sn = 1; ?>
							@foreach($deliveryTransactions as $index => $deliveryTransaction)
								<tr>
									<td>{!! $sn++ !!}</td>
									<td>{!! $deliveryTransaction->customer->name !!}</td>
									<td>{!! $deliveryTransaction->zone->name.', '. $deliveryTransaction->location->name !!}</td>
									<td>{!! $deliveryTransaction->car->display_name !!}</td>
									<td>{!! $deliveryTransaction->carModel->display_model_name !!}</td>
									<td>
										<a href="{{ route('delivery-transaction.edit', $deliveryTransaction->id) }}" class="btn btn-success btn-xs">Edit</a>
										<a href="{{ route('delivery-transaction.destroy', $deliveryTransaction->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
									</td>
								</tr>

							@endforeach

						</tbody>
		      </table>
	      </div>

				<div class="card-footer">
					
					@if ($deliveryTransactions->total() > $deliveryTransactions->perPage())
						{!! $deliveryTransactions->links('backend.partials.paginator') !!}
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
