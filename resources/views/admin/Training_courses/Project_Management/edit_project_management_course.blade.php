@extends('_layouts.Master')

@section('title')
    Edit Project Management Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Project Management Course</strong>
            </div>
            @foreach($Project_Management as $project_management)
            <div class="card-body card-block">
                <form action="../{{$project_management->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Project Management course </label>
                        <input type="text"  name="project_management_course_name" class="@error('project_management_course_name')is-invalid @enderror form-control" placeholder="{{ $project_management->project_management_course_name }}" >
                        @error('project_management_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Project Management course </label>
                        <input type="text"  name="project_management_course_description" class="@error('project_management_description')is-invalid @enderror form-control" placeholder="{{ $project_management->project_management_course_description }}" >
                        @error('project_management_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Project Management course </label>
                        <input type="number"  name="project_management_course_price" class="@error('project_management_course_price')is-invalid @enderror form-control" placeholder="{{ $project_management->project_management_course_price }}" >
                        @error('project_management_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Project Management course teacher </label>
                        <input type="text"  name="project_management_course_teacher_name" class="@error('project_management_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $project_management->project_management_course_teacher_name }}">
                        @error('project_management_course_teacher_name')
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

