@extends('_layouts.Master')

@section('title')
    Edit Gallery Image
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Gallery image</strong>
            </div>
            @foreach($Gallery as $galleryItem)
            <div class="card-body card-block">
                <form action="../{{$galleryItem->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="media_image"> Upload Image </label>
                        <input type="file" class="@error('image')is-invalid @enderror form-control" name="image">
                        @error('image')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-dot-circle-o">Edit</i>
                        </button>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
@endsection('content')

