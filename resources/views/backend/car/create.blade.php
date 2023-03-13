@extends('backend.layouts.master')

@section('title', 'Add Car')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Car</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
	<form role="form" method="post" action="{{ route('car.store') }}">
		<div class="row">
			@csrf
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Car</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('car.index') }}" class="btn btn-success btn-xs" title="List Car">List Car</a>
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
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    
                  @if ($errors->has('name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('name') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="displayName">Display Name</label>
                  <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}">
                    
                  @if ($errors->has('display_name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('display_name') }}
                    </span>
                  @endif
    
                </div>
              </div>

            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <div class="col-12" style="margin-bottom: 10px;">
              <input type="submit" value="Add" class="btn btn-sm btn-primary float-right">
            </div>
          </div>

	      </div>
	      <!-- /.card -->
	    </div>
	    
	  </div>
  </form>
@endsection