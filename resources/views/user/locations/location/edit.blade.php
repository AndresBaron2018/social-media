@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['LocationController@update',$location->id], 'method' => 'PUT','files'=>true])!!}

        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
             @endif

			 <div class="form-group required">
				{!! Form::label("Name") !!}
				{!! Form::text("name", $location->name ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("short Name") !!}
				{!! Form::text("short_name", $location->short_name ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" title="Save" type="submit">Update</button>
            </div>
        </div>

    {!! Form::close() !!}
@endsection
