@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Tag</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                        action="{{ route('tag.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title </label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <select class="form-select btn btn-primary" aria-label="Default select example" name="tag_photo_id" style="
                                max-height:32px;" required>
                                <option selected value="">Select photo</option>
                                @foreach ($photos as $photo)
                                    <option value="{{ $photo->id }}">{{ $photo->title }}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                @csrf
                                <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
