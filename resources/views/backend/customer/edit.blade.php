@extends('backend.layouts.master')

@section('title', 'Edit Customer')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
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
	<form role="form" method="post" action="{{ route('customer.update', $customer->id) }}">
		<div class="row">
      @csrf
			@method('patch')
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Customer</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('customer.index') }}" class="btn btn-success btn-xs" title="List Customer">List Customer</a>
                <a href="{{ route('customer.create') }}" class="btn btn-success btn-xs" title="Add Customer">Add Customer</a>
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
                  <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                    
                  @if ($errors->has('name'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('name') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="zone">Zone</label>
                  
                  <select class="form-control" name="zone_id" id="zone_id">
                    <option value="">Select zone</option>

                    @foreach ($zones as $zone)
                      <option value="{{ $zone->id }}" {{ ($customer->zone_id == $zone->id)? 'selected' : '' }}>{{ $zone->name }}</option>
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
                  <label for="location">Location</label>
                  
                  <select class="form-control" name="location_id" id="location_id">
                    <option value="">Select location</option>

                  </select>
                    
                  @if ($errors->has('location_id'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('location_id') }}
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

  <script src="{{ asset('backend/dataTable/jquery.min.js') }}"></script>
  <script type="text/javascript">

    @if (!empty($customer))
      var zoneId = $('#zone_id').val();
      var url = '{{ url('/') }}';
      var locationId = '{{ $customer->location_id }}';
      // console.log(url);

      $.ajax({
        method: "GET",
        url: url +"/getLocation/"+ zoneId,
        data: {  }
      })
        .done(function( msg ) {

          var data = '<option value="">Select Location</option>';
          for(var i = 0; i < msg.length; i++){
            data = data + '<option value="'+ msg[i]['id'] +'"'+ ((locationId==msg[i]['id'])? 'selected' : '' ) +'>'+ msg[i]['name']+ '</option>';
          }

          $('#location_id').empty();
          $('#location_id').append(data);
        });
    @endif

    $('#zone_id').on('change', function(e){
      var zoneId = $(this).val();
      var url = '{{ url('/') }}';
      // console.log(url);

      $.ajax({
        method: "GET",
        url: url +"/getLocation/"+ zoneId,
        data: {  }
      })
        .done(function( msg ) {

          var data = '<option value="">Select Location</option>';
          for(var i = 0; i < msg.length; i++){
            data = data + '<option value="'+ msg[i]['id'] +'">'+ msg[i]['name']+ '</option>';
          }

          $('#location_id').empty();
          $('#location_id').append(data);
        });
        
    });
  </script>
@endsection