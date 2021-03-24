@extends('layout.admin_layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
@section('content')
<!--- nav bar end-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Dashoard</p>
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
           {{count($members)}}
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
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Monthly Sales</h3>

            <table style="width:100%" border="1">
  <tr>
  <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Edit</th>
    <th>Delete</th>

  </tr>

  @foreach($members as $member)
  <tr>
    <td>{{$member['id']}}</td>
    <td>{{$member['first_name']}}</td>
    <td>{{$member['last_name']}}</td>
    <td><a  class="btn btn-primary" href = 'edit/{{ $member->id }}'>Edit</a></td>
    <td><a class="btn btn-danger" href = 'delete/{{ $member->id }}'>Delete</a></td>
  </tr>

  @endforeach
  <!-- <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr> -->
</table>
            <!-- <div class="embed-responsive embed-responsive-16by9"> -->
<!-- < -->
              <!-- <canvas class="embed-responsive-item" id="lineChartDemo"></canvas> -->
            <!-- </div> -->
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Support Requests</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div> -->
      </div>
    </main>

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    
  

</script>

   
@if(Session::has('record_added'));
<script>
toastr.success("{!!Session::get('record_added')!!}")

</script>
@endif
    <!-- Essential javascripts for application to work-->
 @endsection