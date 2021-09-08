{{-- @php
    dd($album)
@endphp --}}
@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('album.create')}}" class="btn btn-primary">Create</a>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Id User</th>
                <th>Location</th>
                <th>Photo</th>

                <th>ACTION</th>
            </thead>

            <tbody>
                @foreach($album as $row)
                <tr>

                    <td>{{$row->id }}</td>
                    <td>{{$row->title }}</td>
                    <td>{{$row->description }}</td>
                    <td>{{$row->id_user }}</td>
                    <td>{{$row->location->name }}</td>
                    <td>
                        @foreach ($row->photo as $item)
                            {{ $item->title }}
                        @endforeach
                    </td>

                    <td>
                        <a href="{{ route('album.edit', $row->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('album.destroy', $row->id)}}" method="post">
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
        <?php echo $album->render(); ?>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
