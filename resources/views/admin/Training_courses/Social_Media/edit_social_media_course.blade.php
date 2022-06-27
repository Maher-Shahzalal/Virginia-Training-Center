@extends('_layouts.Master')

@section('title')
    Edit Social Media Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Social Media Course</strong>
            </div>
            @foreach($Social_Media as $social_media)
            <div class="card-body card-block">
                <form action="../{{$social_media->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Social Media course </label>
                        <input type="text"  name="social_media_course_name" class="@error('social_media_course_name')is-invalid @enderror form-control" placeholder="{{ $social_media->social_media_course_name }}" >
                        @error('social_media_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Social Media course </label>
                        <input type="text"  name="social_media_course_description" class="@error('social_media_description')is-invalid @enderror form-control" placeholder="{{ $social_media->social_media_course_description }}" >
                        @error('social_media_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Social Media course </label>
                        <input type="number"  name="social_media_course_price" class="@error('social_media_course_price')is-invalid @enderror form-control" placeholder="{{ $social_media->social_media_course_price }}" >
                        @error('social_media_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Social Media course teacher </label>
                        <input type="text"  name="social_media_course_teacher_name" class="@error('social_media_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $social_media->social_media_course_teacher_name }}">
                        @error('social_media_course_teacher_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
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

