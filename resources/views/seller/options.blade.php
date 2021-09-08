@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Seller" role="button"
                            aria-controls="offcanvasExample">
                            Add new Client
                        </a> --}}
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Seller/brand" role="button"
                            aria-controls="offcanvasExample">
                            Brand
                        </a>
                        <a class="btn btn-primary" data-bs-toggle="offcanvas" href="/Seller/product" role="button"
                            aria-controls="offcanvasExample">
                            Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
