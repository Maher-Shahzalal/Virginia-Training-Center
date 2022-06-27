@extends('_layouts.Master')

@section('title')
    Edit Teacher Training Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Teacher Training Course</strong>
            </div>
            @foreach($Teacher_Training as $teacher_training)
            <div class="card-body card-block">
                <form action="../{{$teacher_training->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Teacher Training course </label>
                        <input type="text"  name="teacher_training_course_name" class="@error('teacher_training_course_name')is-invalid @enderror form-control" placeholder="{{ $teacher_training->teacher_training_course_name }}" >
                        @error('teacher_training_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Teacher Training course </label>
                        <input type="text"  name="teacher_training_course_description" class="@error('teacher_training_description')is-invalid @enderror form-control" placeholder="{{ $teacher_training->teacher_training_course_description }}" >
                        @error('teacher_training_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Teacher Training course </label>
                        <input type="number"  name="teacher_training_course_price" class="@error('teacher_training_course_price')is-invalid @enderror form-control" placeholder="{{ $teacher_training->teacher_training_course_price }}" >
                        @error('teacher_training_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Teacher Training course teacher </label>
                        <input type="text"  name="teacher_training_course_teacher_name" class="@error('teacher_training_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $teacher_training->teacher_training_course_teacher_name }}">
                        @error('teacher_training_course_teacher_name')
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

