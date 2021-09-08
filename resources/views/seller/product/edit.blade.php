{{-- @php
    dd($product)
@endphp --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit Product</h2>
            </div>
            <div class="col">
            </div>
            <div class="col">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="table-responsive" style="max-height:250px; max-width:250px; margin-left: 2%; margin-bottom: 2%">
                @foreach ($brands as $brand)
                    <table class="table table-striped table-bordered" id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ID Brand</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> ID Brand</strong>
                    <input type="text" name="brand_id" value="{{ $product->brand_id }}" class="form-control" placeholder="brand_id">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Brand</strong>
                    <input type="text" name="product_brand" value="{{ $product->product_brand }}" class="form-control" placeholder="product_brand">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Size</strong>
                    <input type="text" name="size" value="{{ $product->size }}" class="form-control" placeholder="size">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Shipment Date</strong>
                    <input type="date" type="hour" name="shipment_date" value="{{ $product->shipment_date }}" class="form-control" placeholder="shipment_date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
