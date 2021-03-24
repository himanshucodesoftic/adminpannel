@extends('layout.admin_layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
<!--- nav bar end-->
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Dashboard</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
           <a href="{{url('oneday')}}">   <h4>Last One Day</h4>
         
            </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
            <a href="{{url('sevenday')}}">
              <h4>Last seven Day</h4>
              <!-- <p><b>25</b></p> --></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
            <a href="{{url('thirtyday')}}">
              <h4>Last thirty Day</h4>
              <!-- <p><b>10</b></p> --></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
            <a href="{{url('oneyear')}}">

              <h4>Last 365 days</h4>
              <!-- <p><b>500</b></p> -->
</a>
            </div>
          </div>
        </div>
      </div>

      <form method="post" action="{{ url('password/') }}/{{$rec_obj['id']}}">
@csrf
<div class="container">
<div class="row">
<div class="col-md-12">
<label>Old Password</label>

<input type="text" class="form-control" name="old_password" placeholder="Old password">


</div>


<div class="col-md-12">
<label>New Password</label>

<input type="text" name="password"  class="form-control"placeholder="password">
{!! $errors->first('password', '<small class="text-danger">:message</small>') !!}
                

</div>

<div class="col-md-12">
<label>Confirm Password</label>

<input type="text" name="confirm_password" class="form-control"  placeholder="Confirm password">
{!! $errors->first('confirm_password', '<small class="text-danger">:message</small>') !!}
                

</div>
</div>



</div>

</div>


<!-- <input type="text" name="password" placeholder="password"> -->
<br>
<div class="col-md-12 justify-content-center" >

<button type="submit" class="btn btn-danger"> Register </button>

</div>
</form>


      </div>
      </main>

      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
      @if(Session::has('record_added'));
<script>
toastr.success("{!!Session::get('record_added')!!}")

</script>
@endif
@endsection