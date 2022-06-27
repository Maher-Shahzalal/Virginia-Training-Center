@extends('_layouts.Master')

@section('title')
    Edit NGO Management Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit NGO Management Course</strong>
            </div>
            @foreach($NGO as $ngo)
            <div class="card-body card-block">
                <form action="../{{$ngo->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of NGO Management course </label>
                        <input type="text"  name="ngo_course_name" class="@error('ngo_course_name')is-invalid @enderror form-control" placeholder="{{ $ngo->ngo_course_name }}" >
                        @error('ngo_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of NGO Management course </label>
                        <input type="text"  name="ngo_course_description" class="@error('ngo_description')is-invalid @enderror form-control" placeholder="{{ $ngo->ngo_course_description }}" >
                        @error('ngo_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of NGO Management course </label>
                        <input type="number"  name="ngo_course_price" class="@error('ngo_course_price')is-invalid @enderror form-control" placeholder="{{ $ngo->ngo_course_price }}" >
                        @error('ngo_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of NGO Management course teacher </label>
                        <input type="text"  name="ngo_course_teacher_name" class="@error('ngo_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $ngo->ngo_course_teacher_name }}">
                        @error('ngo_course_teacher_name')
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

