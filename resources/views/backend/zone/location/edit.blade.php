@extends('backend.layouts.master')

@section('title', 'Edit Location')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Location</h1>
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
	<form role="form" method="post" action="{{ route('location.update', $location->id) }}">
		<div class="row">
      @csrf
			@method('patch')
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Location</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('location.index') }}" class="btn btn-success btn-xs" title="List Location">List Location</a>
                <a href="{{ route('location.create') }}" class="btn btn-success btn-xs" title="Add Location">Add Location</a>
              </div>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
            
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="Zone">Zone</label>
                  
                  <select class="form-control" name="zone_id">
                    <option value="">Select zone</option>

                    @foreach ($zones as $z)
                      <option value="{{ $z->id }}" {{ ($location->zone_id == $z->id)? 'selected' : '' }}>{{ $z->name }}</option>
                    @endforeach

                  </select>
                    
                  @if ($errors->has('zone_id'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('zone_id') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ $location->name }}">
                    
                  @if ($errors->has('location'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('location') }}
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