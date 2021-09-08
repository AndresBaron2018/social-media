@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('location.create')}}" class="btn btn-primary">Create</a>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>Name</th>
                <th>Short Name</th>

                <th>ACTION</th>
            </thead>

            <tbody>
                @foreach($location as $row)
                <tr>

                    <td>{{$row->name }}</td>
                    <td>{{$row->short_name }}</td>

                    <td>
                        <a href="{{ route('location.edit', $row->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('location.destroy', $row->id)}}" method="post">
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
        <?php echo $location->render(); ?>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
