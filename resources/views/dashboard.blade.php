@extends('master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@section('content')

<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
    <a class="navbar-brand" href="#">Codesoftic registration</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link text-white"> Welcome: {{ ucfirst(Auth()->user()->first_name) }} </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}"> Logout </a>
        </li>
      </ul>
    </div>
  </nav>

  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    
@if(Session::has('record_added'));
<script>
toastr.success("{!!Session::get('record_added')!!}")

</script>
@endif

@endsection