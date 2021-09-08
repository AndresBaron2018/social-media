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
            <a class="btn btn-primary" href="{{ route('brand.index') }}"> Back</a>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table class="table table-bordered">
                    <tr>
                        <th><strong>Name:</strong></th>
                    </tr>
                    <tr>
                        <td>
                            {{ $brand->name }}
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
