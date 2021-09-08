{{-- @php
dd($brands);
@endphp --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col">
            <h2>Products</h2>
          </div>
          <div class="col">
          </div>
          <div class="col">
            <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
          </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Size</th>
            <th>Product Brand</th>
            <th>Shipment Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->product_brand }}</td>
            <td>{{ $product->shipment_date }}</td>
            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{-- {!! $brands->links() !!} --}}

@endsection
