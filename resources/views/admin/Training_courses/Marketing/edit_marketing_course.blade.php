@extends('_layouts.Master')

@section('title')
    Edit Marketing Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Marketing Course</strong>
            </div>
            @foreach($Marketing as $marketing)
            <div class="card-body card-block">
                <form action="../{{$marketing->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Marketing course </label>
                        <input type="text"  name="marketing_course_name" class="@error('marketing_course_name')is-invalid @enderror form-control" placeholder="{{ $marketing->marketing_course_name }}" >
                        @error('marketing_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Marketing course </label>
                        <input type="text"  name="marketing_course_description" class="@error('marketing_description')is-invalid @enderror form-control" placeholder="{{ $marketing->marketing_course_description }}" >
                        @error('marketing_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Marketing course </label>
                        <input type="number"  name="marketing_course_price" class="@error('marketing_course_price')is-invalid @enderror form-control" placeholder="{{ $marketing->marketing_course_price }}" >
                        @error('marketing_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Marketing course teacher </label>
                        <input type="text"  name="marketing_course_teacher_name" class="@error('marketing_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $marketing->marketing_course_teacher_name }}">
                        @error('marketing_course_teacher_name')
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

