@extends('_layouts.Master')

@section('title')
    Edit Logistics Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Logistics Course</strong>
            </div>
            @foreach($Logistics as $logistics)
            <div class="card-body card-block">
                <form action="../{{$logistics->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Logistics course </label>
                        <input type="text"  name="logistics_course_name" class="@error('logistics_course_name')is-invalid @enderror form-control" placeholder="{{ $logistics->logistics_course_name }}" >
                        @error('logistics_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Logistics course </label>
                        <input type="text"  name="logistics_course_description" class="@error('logistics_course_description')is-invalid @enderror form-control" placeholder="{{ $logistics->logistics_course_description }}" >
                        @error('logistics_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Logistics course </label>
                        <input type="number"  name="logistics_course_price" class="@error('logistics_course_price')is-invalid @enderror form-control" placeholder="{{ $logistics->logistics_course_price }}" >
                        @error('logistics_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Logistics course teacher </label>
                        <input type="text"  name="logistics_course_teacher_name" class="@error('logistics_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $logistics->logistics_course_teacher_name }}">
                        @error('logistics_course_teacher_name')
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

