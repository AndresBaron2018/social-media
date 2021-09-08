@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
</div>
<div class="container padding-bottom">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Location</div>
                    {!! Form::open(['action' =>'LocationController@store', 'method' => 'POST','files'=>true])!!}

                        <div class="col-md-12">
                            {{-- @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif --}}

                                <div class="form-group required">
                                    {!! Form::label("Name") !!}
                                    {!! Form::text("name", null ,["class"=>"form-control","required"=>"required"]) !!}
                                </div>

                                <div class="form-group required">
                                    {!! Form::label("Short Name") !!}
                                    {!! Form::text("short_name", null ,["class"=>"form-control","required"=>"required"]) !!}
                                </div>

                            <div class="well well-sm clearfix padding-bottom">
                                <button class="btn btn-success pull-right" title="Save" type="submit">Create</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ----------------------------ALBUM--------------------------- --}}
<div class="container padding-bottom">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Album</div>

                    {!! Form::open(['action' =>'AlbumController@store', 'method' => 'POST','files'=>true])!!}

                        <div class="col-md-12">
                            {{-- @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif --}}

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
                                        <option value="{{ $photo->id }}">{{ $photo->title }}</option>
                                    @endforeach
                                </select>

                            <div class="well well-sm clearfix padding-bottom" style="margin-top: 8px;">
                                <button class="btn btn-success pull-right" title="Save" type="submit">Create</button>
                            </div>
                        </div>
                    {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
    {{-- ----------------------------PHOTO-------------------------------------- --}}
    <div class="container padding-bottom">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Photo</div>

                    <div class="card-body">
                        <form
                        action="{{ route('photo.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title </label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description </label>
                                <textarea name="description" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>view</label>
                                <input type="text" name="view" required>
                            </div>
                            <div class="form-group">
                                <label>privacy</label>
                                <textarea name="privacy" class="form-control"></textarea required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>image_path</label>
                                <input type="file" name="image_path" required>
                            </div>
                            {{-- <select multiple="multiple" name="tag" id="tags">
                                @foreach($tag as $Key => $aSport)
                                    @foreach($aItem->sports as $aItemKey => $aItemSport)
                                        <option value="{{$aKey}}" @if($aKey == $aItemKey)selected="selected"@endif>{{$aSport}}</option>
                                    @endforeach
                                @endforeach
                            </select> --}}
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{-- ----------------------------COMMENT-------------------------------------- --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Comments and Tags</div>
                                <div class="card-body">
                                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/comment" role="button"
                                        aria-controls="offcanvasExample">
                                        Comment
                                    </a>
                                    <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/tag" role="button"
                                        aria-controls="offcanvasExample">
                                        Tag
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
<script src="{{ mix('/js/app.js') }}"></script>
@endsection
