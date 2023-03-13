@extends('backend.layouts.master')

@section('title', 'Add Delivery Transaction')

@section('content-header')
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Delivery Transaction</h1>
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
	<form role="form" method="post" action="{{ route('delivery-transaction.store') }}">
		<div class="row">
			@csrf
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="card card-primary">
	        <div class="card-header">
	          <h3 class="card-title">Delivery Transaction</h3>

            <div class="card-tools" style="display: flex;">
              <div style="margin-right: 30px;">
                <a href="{{ route('delivery-transaction.index') }}" class="btn btn-success btn-xs" title="List Delivery Transaction">List Delivery Transaction</a>
              </div>
            </div>

	        </div>
	        <!-- /.card-header -->
	        <!-- form start -->

          <div class="card-body">
            
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="Customer">Customer</label>
                  
                  <select class="form-control" name="customer_id">
                    <option value="">Select Customer</option>

                    @foreach ($customers as $customer)
                      <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach

                  </select>
                    
                  @if ($errors->has('customer_id'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('customer_id') }}
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
                      <option value="{{ $zone->id }}">{{ $zone->name }}</option>
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

              <div class="col-md-12">
                <div class="form-group">
                  <label for="car">Car</label>
                  
                  <select class="form-control" name="car_id" id="car_id">
                    <option value="">Select car</option>

                    @foreach ($cars as $car)
                      <option value="{{ $car->id }}">{{ $car->display_name }}</option>
                    @endforeach

                  </select>
                    
                  @if ($errors->has('car_id'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('car_id') }}
                    </span>
                  @endif
    
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="carModel">Car Model</label>
                  
                  <select class="form-control" name="car_model_id" id="car_model_id">
                    <option value="">Select Car Model</option>

                  </select>
                    
                  @if ($errors->has('car_model_id'))
                    <span class="help-block" style="color: #f86c6b;">
                      {{ $errors->first('car_model_id') }}
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

  <script src="{{ asset('backend/dataTable/jquery.min.js') }}"></script>
  <script type="text/javascript">
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

    $('#car_id').on('change', function(e){
      var carId = $(this).val();
      var url = '{{ url('/') }}';

      $.ajax({
        method: "GET",
        url: url +"/getCarModel/"+ carId,
        data: {  }
      })
        .done(function( msg ) {

          console.log(msg);
          var data = '<option value="">Select Car Model</option>';
          for(var i = 0; i < msg.length; i++){
            data = data + '<option value="'+ msg[i]['id'] +'">'+ msg[i]['display_model_name']+ '</option>';

          }
          $('#car_model_id').empty();
          $('#car_model_id').append(data);
        });
        
    });
  </script>
@endsection