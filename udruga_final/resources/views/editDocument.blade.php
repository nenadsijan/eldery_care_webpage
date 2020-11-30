@extends('layout')

@section('content')

<div class="container2">	
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <h1 style="text-align: center;">Dodaj fajl</h1>
       @if(count($errors) > 0) 
                  <div class="alert alert-danger">
                    <ul>
                    @foreach($errors ->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach 
                    </ul>
                  </div>
  @endif

      {!! Form::open(['action' => ['MainController@updateDocument', $document -> id], 'method' => 'POST', 'files' => true]) !!}
     <div class="form-group">

            {{Form::label('naslov', 'Naslov')}}
            {{Form::text('naslov', $document->title, ['id' => 'inputEmail', 'class' => ($errors->has('naslov')) ? 'form-control is-invalid' : 'form-control',  'placeholder' => 'Unesite naslov'])}}
     
        </div>  

    <div class="form-group">
           {{  'Promijeni fajl:'.' '.$document-> file_name }} <br>
        {{    Form::file('document'), $document-> file_name }}
      
    </div>  

 
            {{Form::submit('Prihvati', ['class' => 'btn btn-success']) }}
            <a href="{{ route('document.delete', ['id' =>  $document -> id ]) }}" class="btn btn-danger text-capitalize btn-xs" style="margin-right: 3px;">Obriši Document</a>
                 <a href="{{URL::route('main')}}"  class="btn btn-info btn-xs proba" style="margin-right: 3px;">Početna strana</a>
         {!! Form::close() !!}




        </div><!-- /card-container -->
    </div><!-- /container -->
 </div><!-- /container -->
        
     
@endsection