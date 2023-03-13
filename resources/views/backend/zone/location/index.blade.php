@extends('backend.layouts.master')
@section('title', 'List Location')

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
		      <i class="fa fa-align-justify"></i> List Location

		      <div class="card-tools" style="display: flex;">
						<div style="margin-right: 10px;">
							<a href="{{ route('location.create') }}" class="btn btn-primary btn-xs" title="Add Location">Add Location</a>
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

							<?php $sn = 1; ?>
							@foreach($zones as $index => $zone)
								<tr>
									<td>{!! '<b>' .$sn++. '</b>' !!}</td>
									<td>{!! '<b>' .$zone->name. '</b>' !!}</td>
									<td></td>
								</tr>

								<?php $sn2 = 1; ?>
								@foreach ($zone->locations as $location)
									<tr>
										<td style="padding-left: 30px;">{{ $sn2++ }}</td>
										<td style="padding-left: 30px;">{{ $location->name }}</td>
										<td>
											<a href="{{ route('location.edit', $location->id) }}" class="btn btn-success btn-xs">Edit</a>
											<a href="{{ route('location.destroy', $location->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Do you want to delete this item ?')">Delete</a>
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
