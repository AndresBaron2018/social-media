{{-- @php
    dd($photo);
@endphp --}}
@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('photo.create')}}" class="btn btn-primary">Create</a>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>privacy</th>
                <th>date</th>
                <th>Id_location</th>
                <th>Comment</th>

                <th>ACTION</th>
            </thead>

            <tbody>
                @foreach($photo as $row)

                <tr>

                    <td>{{$row->id }}</td>
                    <td>{{$row->title }}</td>
                    <td>{{$row->description }}</td>
                    <td>{{$row->privacy }}</td>
                    <td>{{$row->date }}</td>
                    <td>{{$row->view }}</td>
                    <td>
                        @if ($row->image_path)
                            <img src="{{ $row->get_image }}" class="card-img-top">
                        @endif
                    </td>
                    <td>
                        @foreach ($row->comment as $comment)
                            {{$comment->content }}      ||
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ route('photo.edit', $row->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('photo.destroy', $row->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div>
        <?php echo $photo->render(); ?>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
