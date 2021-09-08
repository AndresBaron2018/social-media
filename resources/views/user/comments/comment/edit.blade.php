@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['CommentController@update',$comment->id], 'method' => 'PUT','files'=>true])!!}

        <div class="col-md-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
             @endif

			 <div class="form-group required">
				{!! Form::label("Date") !!}
				{!! Form::date("date", $comment->date ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("Content") !!}
				{!! Form::text("content", $comment->content ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <div class="well well-sm clearfix">
                <button class="btn btn-success pull-right" title="Save" type="submit">Update</button>
            </div>
        </div>

    {!! Form::close() !!}
@endsection
