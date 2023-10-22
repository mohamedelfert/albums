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
        <div class="col-md-12">
            <h2>Edit</h2>
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{ route('albums.create') }}" class="btn btn-success">Create</a>
                    <h6 class="m-0 font-weight-bold text-primary">Edit Image</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route("albums.update",$image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="name"
                       value="{{ old('name',$image->name )}}">
                @if($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label>image file</label>
                    <input type="file" name="image" class="form-control">
                    @if($errors->has('image'))
                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                    @endif
                    <img src="{{ $image->getFirstMediaUrl('images') }}" alt="no image" width="100" height="100">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>

</body>

</html>
