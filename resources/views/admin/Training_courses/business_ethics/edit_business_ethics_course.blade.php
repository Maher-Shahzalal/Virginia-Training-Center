@extends('_layouts.Master')

@section('title')
    Edit Business Ethics Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Business Ethics Course</strong>
            </div>
            @foreach($Business_ethics as $business_ethics)
            <div class="card-body card-block">
                <form action="../{{$business_ethics->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Business Ethics course </label>
                        <input type="text"  name="business_ethics_course_name" class="@error('business_ethics_course_name')is-invalid @enderror form-control" placeholder="{{ $business_ethics->business_ethics_course_name }}" >
                        @error('business_ethics_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Business Ethics course </label>
                        <input type="text"  name="business_ethics_course_description" class="@error('business_ethics_course_description')is-invalid @enderror form-control" placeholder="{{ $business_ethics->business_ethics_course_description }}" >
                        @error('business_ethics_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Business Ethics course </label>
                        <input type="number"  name="business_ethics_course_price" class="@error('business_ethics_course_price')is-invalid @enderror form-control" placeholder="{{ $business_ethics->business_ethics_course_price }}" >
                        @error('business_ethics_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Business Ethics course teacher </label>
                        <input type="text"  name="business_ethics_course_teacher_name" class="@error('business_ethics_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $business_ethics->business_ethics_course_teacher_name }}">
                        @error('business_ethics_course_teacher_name')
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

