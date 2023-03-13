@extends('backend.layouts.master')
@section('title', 'List Car Model')

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
		      <i class="fa fa-align-justify"></i> List Car Model

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('car-model.create') }}" class="btn btn-primary btn-xs" title="Add Car Model">Add Car Model</a>
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

							<?php $sn = 1; ?>
							@foreach($cars as $index => $car)
								<tr>
									<td>{!! '<b>' .$sn++. '</b>' !!}</td>
									<td>{!! '<b>' .$car->name. '</b>' !!}</td>
									<td>{!! '<b>' .$car->display_name. '</b>' !!}</td>
									<td></td>
								</tr>

								<?php $sn2 = 1; ?>
								@foreach ($car->carModels as $model)
									<tr>
										<td style="padding-left: 30px;">{{ $sn2++ }}</td>
										<td style="padding-left: 30px;">{{ $model->model_name }}</td>
										<td style="padding-left: 30px;">{{ $model->display_model_name }}</td>
										<td>
											<a href="{{ route('car-model.edit', $model->id) }}" class="btn btn-success btn-xs">Edit</a>
											<a href="{{ route('car-model.destroy', $model->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
										</td>
									</tr>
								@endforeach

							@endforeach

						</tbody>
		      </table>
	      </div>

		  </div>
		</div>
	</div>
@endsection
