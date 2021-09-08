{{-- @php
dd($albums)
@endphp --}}
@extends('layouts.app')

@section('content')
{{-- --------------------LOCATION----------------------- --}}
<div class="container-fluid" id="app">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify">Locations</i>
                </div>
                <div class="row d-flex justify-content-center mt-5">
                    @foreach ($locations as $location)
                        <div class="col-4">
                            <div class="card col-11 mb-4 bg-light">

                                <div class="card-body">
                                    <h5 class="card-title">name {{ $location->name }}</h5>
                                    <p class="card-text"> location {{ $location->short_name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/location" role="button"
        aria-controls="offcanvasExample">
        Look Locations
        </a>
    </div>
</div>
{{-- ----------------------------------ALBUM--------------------------------------- --}}
    <div class="container-fluid" id="app">
        <div class="card">
            <div class="card-header" style="color: red">
                <i class="fa fa-align-justify"></i> Albums</b>
            </div>
            <div class="card-body">
                <div class="card">

                        <div class="row d-flex justify-content-center mt-5">
                            @foreach ($albums as $album)
                                <div class="col-4">
                                    <div class="card col-11 mb-4 bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title">Title {{ $album->title }}</h5>
                                            <p class="card-text"> Description {{ $album->description }}</p>
                                            <p class="card-text"> Id User {{$album->id_user }}</p>
                                            <p class="card-text" style="color: blue;"> Location {{$album->location->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                </div>
            </div>
            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/album" role="button"
                            aria-controls="offcanvasExample">
                            Look Albums
            </a>
        </div>
    </div>
    {{-- ----------------------------------ALBUM--------------------------------------- --}}
    <div class="container-fluid" id="app">
        <div class="card">
            <div class="card-header" style="color: red">
                <i class="fa fa-align-justify"></i> Photos</b>
            </div>
            <div class="card-body">
                <div class="card">

                        <div class="row d-flex justify-content-center mt-5">
                            @foreach ($photos as $photo)
                                <div class="col-4">
                                    <div class="card col-11 mb-4 bg-light">
                                        <img class="card-img-top" src="http://localhost:8000/storage/app/public/{{$photo->image_path }}" style="width: 250px">
                                        <div class="card-body">
                                            <h5 class="card-title">Title {{ $photo->title }}</h5>
                                            <p class="card-text"> Description {{ $photo->description }}</p>
                                            <p class="card-text"> Privacy {{$photo->privacy }}</p>
                                            <p class="card-text" type="date"> Date {{$photo->date }}</p>

                                            <div>
                                                <div class="price text-success">
                                                    <h5 class="mt-4 " style="color: blue;">View {{ $photo->view }}</h5>
                                                </div>
                                                <a type="date" class="p-2 text-dark" href="#">Shipment Date {{ $photo->privacy }}</a>
                                                <h5 style="color: blue;">Comments</h5>
                                                <h6>
                                                    @foreach ($photo->comment as $comment)
                                                        {{$comment->content }}      ||
                                                    @endforeach
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                </div>
            </div>
            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/photo" role="button"
                            aria-controls="offcanvasExample">
                            Look Photos
            </a>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
