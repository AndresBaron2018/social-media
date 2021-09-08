@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Admin" role="button"
                            aria-controls="offcanvasExample">
                            Admin
                        </a>
                        {{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Seller/options" role="button"
                            aria-controls="offcanvasExample">
                            Seller
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Client" role="button"
                            aria-controls="offcanvasExample">
                            Client
                        </a> --}}
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-top: 10px;">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/user" role="button"
                            aria-controls="offcanvasExample">
                            Add Items
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="user/show" role="button"
                            aria-controls="offcanvasExample">
                            Show Items
                         </a>
                        {{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/location" role="button"
                            aria-controls="offcanvasExample">
                            Location
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/album" role="button"
                            aria-controls="offcanvasExample">
                            Album
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/photo" role="button"
                            aria-controls="offcanvasExample">
                            Photo
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/comment" role="button"
                            aria-controls="offcanvasExample">
                            Comment
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/tag" role="button"
                            aria-controls="offcanvasExample">
                            Tag
                        </a>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example" style="margin-top: 10px;">
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/PersonalInformation" role="button"
                            aria-controls="offcanvasExample">
                            Personal Information
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
