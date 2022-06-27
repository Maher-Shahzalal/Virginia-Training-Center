@extends('_layouts.Master')

@section('title')
    Edit Innovation Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Innovation Course</strong>
            </div>
            @foreach($Innovation as $innovation)
            <div class="card-body card-block">
                <form action="../{{$innovation->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Innovation course </label>
                        <input type="text"  name="innovation_course_name" class="@error('innovation_course_name')is-invalid @enderror form-control" placeholder="{{ $innovation->innovation_course_name }}" >
                        @error('innovation_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Innovation course </label>
                        <input type="text"  name="innovation_course_description" class="@error('innovation_description')is-invalid @enderror form-control" placeholder="{{ $innovation->innovation_course_description }}" >
                        @error('innovation_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Innovation course </label>
                        <input type="number"  name="innovation_course_price" class="@error('innovation_course_price')is-invalid @enderror form-control" placeholder="{{ $innovation->innovation_course_price }}" >
                        @error('innovation_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Innovation course teacher </label>
                        <input type="text"  name="innovation_course_teacher_name" class="@error('innovation_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $innovation->innovation_course_teacher_name }}">
                        @error('innovation_course_teacher_name')
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

