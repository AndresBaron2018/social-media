@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="app">
        <div class="card">
            <div class="card-header" style="color: red">
                <i class="fa fa-align-justify"></i> Consumption By Web</b>
            </div>
            <div class="card-body">
                <div class="card">
                    @foreach ($brands as $brand)
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ $brand->name }}
                    </div>
                    <div class="row d-flex justify-content-center mt-5">
                        @foreach ($brand->product as $product)
                            <div class="col-4">
                                <div class="card col-11 mb-4 bg-light">
                                    <div class="card-header d-flex justify-content-center">
                                        <img class="card-img-top" alt="..." style="width: 250px">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">name {{ $product->name }}</h5>
                                        <p class="card-text"> Size {{ $product->size }}</p>
                                        <div>
                                            <div class="price text-success">
                                                <h5 class="mt-4">Product Brand {{ $product->product_brand }}</h5>
                                            </div>
                                            <a type="date" class="p-2 text-dark" href="#">Shipment Date {{ $product->shipment_date }}</a>
                                        </div>
                                        <a class="btn btn-success">Comprar</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="app">
        <div class="card">
            <div class="card-header" style="color: rgb(0, 26, 255)">
                <i class="fa fa-align-justify"></i> Consumption By API</b>
            </div>
            <div class="card-body">
                <api />
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
