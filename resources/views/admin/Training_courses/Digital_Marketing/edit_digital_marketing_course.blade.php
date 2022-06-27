@extends('_layouts.Master')

@section('title')
    Edit Digital Marketing Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Digital Marketing Course</strong>
            </div>
            @foreach($Digital_Marketing as $digital_marketing)
            <div class="card-body card-block">
                <form action="../{{$digital_marketing->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of Digital Marketing course </label>
                        <input type="text"  name="digital_marketing_course_name" class="@error('digital_marketing_course_name')is-invalid @enderror form-control" placeholder="{{ $digital_marketing->digital_marketing_course_name }}" >
                        @error('digital_marketing_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of Digital Marketing course </label>
                        <input type="text"  name="digital_marketing_course_description" class="@error('digital_marketing_description')is-invalid @enderror form-control" placeholder="{{ $digital_marketing->digital_marketing_course_description }}" >
                        @error('digital_marketing_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of Digital Marketing course </label>
                        <input type="number"  name="digital_marketing_course_price" class="@error('digital_marketing_course_price')is-invalid @enderror form-control" placeholder="{{ $digital_marketing->digital_marketing_course_price }}" >
                        @error('digital_marketing_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of Digital Marketing course teacher </label>
                        <input type="text"  name="digital_marketing_course_teacher_name" class="@error('digital_marketing_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $digital_marketing->digital_marketing_course_teacher_name }}">
                        @error('digital_marketing_course_teacher_name')
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

