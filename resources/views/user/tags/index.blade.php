{{-- @php
    dd($tag);
@endphp --}}
@extends('layouts.app')

@section('content')
<div class="col-md-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('tag.create')}}" class="btn btn-primary">Create</a>
    <div class="table-responsive">
        <table class="table table-bordered table-condensed table-striped">
            <thead>

                <th>Id</th>
                <th>Title</th>
                <th>ACTION</th>
            </thead>

            <tbody>
                @foreach($tags as $row)

                <tr>

                    <td>{{$row->id }}</td>
                    <td>{{$row->title }}</td>

                    <td>
                        <a href="{{ route('tag.edit', $row->id)}}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('tag.destroy', $row->id)}}" method="post">
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
        <?php echo $tags->render(); ?>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection
