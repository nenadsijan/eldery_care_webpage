
@extends('layout')

@section('content')
<div class="container2">  
<div class="container">
        <div class="card card-container">
          
            <h1 style="text-align: center;">Admin login</h1>


   @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   <form method="post" action="{{ url('/main/checklogin') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <label>Unesi email</label>
     <input type="email" name="email" class="form-control" />
    </div>
    <div class="form-group">
     <label>Unesi šifru</label>
     <input type="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" />
    </div>
   </form>
             </div><!-- /card-container -->
    </div><!-- /container -->
 </div><!-- /container -->
@endsection