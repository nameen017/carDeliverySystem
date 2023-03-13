@extends('backend.layouts.master')

@section('title', 'Edit Zone')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Zone</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="{{ route('zone.update', $zone->id) }}">
		<div class="row">
      @csrf
			@method('patch')
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Zone</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('zone.index') }}" class="btn btn-success btn-xs" title="List Car">List Zone</a>
                <a href="{{ route('zone.create') }}" class="btn btn-success btn-xs" title="Add Car">Add Zone</a>
              </div>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $zone->name }}">
                    
                  @if ($errors->has('name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('name') }}
                    </span>
                  @endif
    
                </div>
              </div>

            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <div class="col-12" style="margin-bottom: 10px;">
              <input type="submit" value="Update" class="btn btn-sm btn-primary float-right">
            </div>
          </div>

	      </div>
	      <!-- /.card -->
	    </div>
	    
	  </div>
  </form>
@endsection