@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['AlbumController@update',$album->id], 'method' => 'PUT','files'=>true])!!}

        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
             @endif

			 <div class="form-group required">
				{!! Form::label("Title") !!}
				{!! Form::text("title", $album->title ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("Description") !!}
				{!! Form::text("description", $album->description ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="form-group required">
				{!! Form::label("Id_user") !!}
				{!! Form::text("id_location", $album->id_location ,["class"=>"form-control","required"=>"required"]) !!}
			</div>
            <div class="form-group required">
				{!! Form::label("Id_photo") !!}
				{!! Form::text("id_photo", $album->id_photo ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" title="Save" type="submit">Update</button>
            </div>
        </div>

    {!! Form::close() !!}
@endsection
