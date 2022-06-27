@extends('_layouts.Master')

@section('title')
    Edit General English Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit General English Course</strong>
            </div>
            @foreach($General_English as $general_english)
            <div class="card-body card-block">
                <form action="../{{$general_english->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of General English course </label>
                        <input type="text"  name="general_english_course_name" class="@error('general_english_course_name')is-invalid @enderror form-control" placeholder="{{ $general_english->general_english_course_name }}" >
                        @error('general_english_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of General English course </label>
                        <input type="text"  name="general_english_course_description" class="@error('general_english_description')is-invalid @enderror form-control" placeholder="{{ $general_english->general_english_course_description }}" >
                        @error('general_english_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of General English course </label>
                        <input type="number"  name="general_english_course_price" class="@error('general_english_course_price')is-invalid @enderror form-control" placeholder="{{ $general_english->general_english_course_price }}" >
                        @error('general_english_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of General English course teacher </label>
                        <input type="text"  name="general_english_course_teacher_name" class="@error('general_english_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $general_english->general_english_course_teacher_name }}">
                        @error('general_english_course_teacher_name')
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

