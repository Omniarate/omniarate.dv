@extends('app')


@section('content')

   {{ $user-> name }}


   @if($user -> id == Auth::User()->id)
       <h1 class="well well-lg">Upload Image</h1>
       <div class="container col-md-4">
           @if(isset($success))
               <div class="alert alert-success"> {{$success}} </div>
           @endif
           {!! Form::open(['action'=>'PagesController@store', 'files'=>true]) !!}

           <div class="form-group">
               {!! Form::label('title', 'Title:') !!}
               {!! Form::text('title', null, ['class'=>'form-control']) !!}
           </div>

           <div class="form-group">
               {!! Form::label('description', 'Description:') !!}
               {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>10] ) !!}
           </div>

           <div class="form-group">
               {!! Form::label('image', 'Choose an image') !!}
               {!! Form::file('image') !!}
           </div>

           <div class="form-group">
               {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
           </div>
               {!! Form::select('category', $categories, null, ['class' => 'input-sm']) !!}

           {!! Form::close() !!}
           <div class="alert-warning">
               @foreach( $errors->all() as $error )
                   <br> {{ $error }}
               @endforeach
           </div>
       </div>

       <section class="col-md-12">
       <h1 class="well well-lg">All Image List</h1>
           <div class="img-holder col-md-3">
       @foreach( $images as $image )
           <img src="{{ '/images/'.$image->filePath }}"/>
       @endforeach
           </div>
       </section>
   @endif

@endsection