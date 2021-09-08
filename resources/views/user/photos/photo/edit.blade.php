@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Photo</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('photo.update', $photo) }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title *</label>
                                <input type="text" name="title" class="form-control" required value="{{ old('title', $photo->title) }}">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description', $photo->description) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>privacy</label>
                                <textarea name="privacy" class="form-control">{{ old('privacy', $photo->privacy) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" type="hour" name="date" value="{{ $photo->date }}" placeholder="date">
                            </div>
                            <div class="form-group">
                                <label>image_path</label>
                                <input type="file" name="image_path">
                            </div>
                            <div class="form-group">
                                <label>id_comment</label>
                                <input type="number" name="id_comment">
                            </div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
