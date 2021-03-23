@extends('layout.admin_layout')
@section('content')



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
      <!-- </main> -->




@endsection