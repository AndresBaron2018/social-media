@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
          <div class="col">
            <h2> Show Product</h2>
          </div>
          <div class="col">
          </div>
          <div class="col">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>ID</strong></th>
                        <th><strong>Name</strong></th>
                        <th><strong>Size</strong></th>
                        <th><strong>Product Brand</strong></th>
                        <th><strong>Shipment Date</strong></th>
                    </tr>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->product_brand }}</td>
                        <td>{{ $product->shipment_date }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
