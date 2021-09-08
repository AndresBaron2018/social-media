@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Photo</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                        action="{{ route('photo.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title </label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description </label>
                                <textarea name="description" rows="6" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>view</label>
                                <input type="text" name="view" required>
                            </div>
                            <div class="form-group">
                                <label>privacy</label>
                                <textarea name="privacy" class="form-control"></textarea required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label>image_path</label>
                                <input type="file" name="image_path" required>
                            </div>
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
