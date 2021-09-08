@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="app">
        <div class="card">
            <div class="card-header" style="color: rgb(17, 0, 255)">
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
