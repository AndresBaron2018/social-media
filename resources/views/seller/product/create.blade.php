{{-- @php
dd($brands);
@endphp --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col">
        <h2>Add New Product</h2>
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

<form action="{{ route('product.store') }}" method="POST">
    @csrf

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
            <select class="form-select btn btn-primary" aria-label="Default select example" name="brand_id" style="
             max-height:30px;" required>
                <option selected>Select Brand ID</option>
                    @foreach ($brands as $brand)
                        <option >{{ $brand->id }}</option>
                    @endforeach
            </select>
            <select class="form-select btn btn-primary" aria-label="Default select example" name="product_brand" style="
             max-height:30px;">
                <option selected>Select Brand</option>
                @foreach ($brands as $brand)
                    <option>{{ $brand->name }}</option>
                @endforeach
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>size</strong>
                 <input type="text" name="size" class="form-control" placeholder="size">
                </div>
            </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $name }}</strong>
                <input type="text" name="brand_id" class="form-control" placeholder="{{ $name }}">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>shipment_date</strong>
                <input type="date" name="shipment_date" class="form-control" placeholder="shipment_date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection


