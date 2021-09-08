@extends('layouts.app')

@section('content')
{{-- {!! Form::open(['action' =>'CommentController@store', 'method' => 'POST','files'=>true])!!}

    <div class="col-md-6">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <select class="form-select btn btn-primary" aria-label="Default select example" name="id_photo" style="
                max-height:32px;" required>
                    <option selected value="">Select photo</option>
                    @foreach ($photos as $photo)
                        <option value="{{ $photo->id }}">{{ $photo->title }}</option>
                    @endforeach
            </select>


            <form action="{{ route('comment.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title *</label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $photo->title) }}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $photo->description) }}</textarea>
                </div>
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                </div>
            </form>

			 <div class="form-group required">
				{!! Form::label("date") !!}
				{!! Form::date("date", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>

			 <div class="form-group required">
				{!! Form::label("content") !!}
				{!! Form::text("content", null ,["class"=>"form-control","required"=>"required"]) !!}
			</div>



        <div class="well well-sm clearfix">
            <button class="btn btn-success pull-right" title="Save" type="submit">Create</button>
        </div>
    </div>

{!! Form::close() !!} --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Comment</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                        action="{{ route('comment.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                            <select class="form-select btn btn-primary" aria-label="Default select example" name="id_photo" style="
                                max-height:32px;" required>
                                    <option selected value="">Select photo</option>
                                    @foreach ($photos as $photo)
                                        <option value="{{ $photo->id }}">{{ $photo->title }}</option>
                                    @endforeach
                            </select>
                            <div class="form-group">
                                <label>date </label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Content </label>
                                <textarea name="content" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
