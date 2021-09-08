@extends('layouts.app')

@section('content')
{!! Form::open(['action' =>'AlbumController@store', 'method' => 'POST','files'=>true])!!}

    <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


			 <div class="form-group required">
				{!! Form::label("Title") !!}
				{!! Form::text("title", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("Description") !!}
				{!! Form::text("description", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

            <select class="form-select btn btn-primary" aria-label="Default select example" name="id_location" style="
                max-height:30px;" required>
                    <option selected value="">Select location</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
           </select>

            <select class="form-select btn btn-primary" aria-label="Default select example" name="id_photo" style="
                max-height:32px;" required>
                <option selected value="">Select photo</option>
                @foreach ($photos as $photo)
                    <option value="{{ $photo->id }}"><img src="{{ $photo->get_image }}" class="card-img-top">{{ $photo->title }}</option>
                @endforeach
            </select>

        <div class="well well-sm clearfix" style="margin-top: 8px;">
            <button class="btn btn-success pull-right" title="Save" type="submit">Create</button>
        </div>
    </div>

{!! Form::close() !!}
@endsection

