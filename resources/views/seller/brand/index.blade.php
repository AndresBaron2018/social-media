{{-- @php
dd($brands);
@endphp --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col">
            <h2>Brands</h2>
          </div>
          <div class="col">
          </div>
          <div class="col">
            <a class="btn btn-success" href="{{ route('brand.create') }}"> Create New Brand</a>
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
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($brands as $brand)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $brand->name }}</td>
            <td>
                <form action="{{ route('brand.destroy',$brand->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('brand.show',$brand->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('brand.edit',$brand->id) }}">Edit</a>

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
