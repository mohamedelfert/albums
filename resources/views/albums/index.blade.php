<!DOCTYPE html>
<html lang="en">

<head>
    <title>Albums CRUD Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container mt-5">
    <div class="row">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        @endif
        <div class="col-md-12">
            <h2>Albums CRUD Example</h2>
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{ route('albums.create') }}" class="btn btn-success">Create</a>
                    <h6 class="m-0 font-weight-bold text-primary">Albums List</h6>
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->name }}</td>
                        <td><img src="{{ $album->getFirstMediaUrl('images') }}" alt="no image" width="100" height="100"></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('albums.edit',$album->id) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('albums.destroy',$album->id) }}" method="POST" onsubmit="return confirm('{{ trans('are You Sure ? ') }}');"
                                  style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

</body>

</html>
