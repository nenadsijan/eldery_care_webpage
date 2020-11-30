
@extends('layout')

@section('content')

<div class="container2">    
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <h1 style="text-align: center;">Promijeni Vijest</h1>
                 @if(count($errors) > 0) 
                  <div class="alert alert-danger">
                    <ul>
                    @foreach($errors ->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach 
                    </ul>
                  </div>
  @endif

    {!! Form::open(['action' => ['MainController@update', $post -> id], 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {{Form::label('naslov', 'Naslov')}}
            {{Form::text('naslov', $post-> title, ['class' => ($errors->has('naslov')) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'naslov'])}}
        </div>  

        <div class="form-group">
            {{Form::label('sadržaj', 'Sadržaj')}}
            {{Form::textarea('sadržaj', $post-> content, ['class' => ($errors->has('sadržaj')) ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'sadržaj',  'rows' => 5, 'cols' => 5])}}
          
        </div>  

        <div class="form-group">
               {{  'Promijeni fajl:'.' '.$post-> file_name }} <br>
                 {{    Form::file('image'), $post-> image }}
      
         </div>  


           <div class="form-group">
           {{  'Promijeni sliku:'.' '.$post-> post_thumbnail }}
        {{Form::file('slika')}}

     </div>
     <!--Hidden form is used because we want to develope route for edit form whcih is PUT-->
            {{Form::hidden('_method', 'PUT') }}
            {{Form::submit('Prihvati', ['class' => 'btn btn-success']) }}
                <a href="{{ route('post.delete', ['id' =>  $post -> id ]) }}" class="btn btn-danger text-capitalize btn-xs" style="margin-right: 3px;">Obriši Vijest</a>
                   <a href="{{URL::route('main')}}"  class="btn btn-info btn-xs proba" style="margin-right: 3px;">Početna strana</a>
    {!! Form::close() !!}
            </div><!-- /card-container -->
    </div><!-- /container -->
 </div><!-- /container -->
        

@endsection


