@extends('layout.admin_layout')
@section('content')
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
              {{count($users)}}
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

  @foreach($users as $users)
  <tr>
    <td>{{$users['id']}}</td>
    <td>{{$users['first_name']}}</td>
    <td>{{$users['last_name']}}</td>
    <td><a  class="btn btn-primary" href = 'edit/{{ $users->id }}'>Edit</a></td>
    <td><a class="btn btn-danger" href = 'delete/{{ $users->id }}'>Delete</a></td>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
   
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready(function() {
    $('#example').DataTable();
} );


</script>
    <!-- Essential javascripts for application to work-->
 @endsection
