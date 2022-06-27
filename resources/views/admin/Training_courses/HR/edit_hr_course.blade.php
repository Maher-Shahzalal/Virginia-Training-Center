@extends('_layouts.Master')

@section('title')
    Edit HR Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit HR Course</strong>
            </div>
            @foreach($HR as $hr)
            <div class="card-body card-block">
                <form action="../{{$hr->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of HR course </label>
                        <input type="text"  name="hr_course_name" class="@error('hr_course_name')is-invalid @enderror form-control" placeholder="{{ $hr->hr_course_name }}" >
                        @error('hr_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of HR course </label>
                        <input type="text"  name="hr_course_description" class="@error('hr_description')is-invalid @enderror form-control" placeholder="{{ $hr->hr_course_description }}" >
                        @error('hr_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of HR course </label>
                        <input type="number"  name="hr_course_price" class="@error('hr_course_price')is-invalid @enderror form-control" placeholder="{{ $hr->hr_course_price }}" >
                        @error('hr_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of HR course teacher </label>
                        <input type="text"  name="hr_course_teacher_name" class="@error('hr_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $hr->hr_course_teacher_name }}">
                        @error('hr_course_teacher_name')
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

