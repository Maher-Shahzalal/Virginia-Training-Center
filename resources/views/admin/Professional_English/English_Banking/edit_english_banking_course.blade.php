@extends('_layouts.Master')

@section('title')
    Edit English Banking Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit English Banking Course</strong>
            </div>
            @foreach($English_banking as $english_banking)
            <div class="card-body card-block">
                <form action="../{{$english_banking->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of English Banking course </label>
                        <input type="text"  name="english_banking_course_name" class="@error('english_banking_course_name')is-invalid @enderror form-control" placeholder="{{ $english_banking->english_banking_course_name }}" >
                        @error('english_banking_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of English Banking course </label>
                        <input type="text"  name="english_banking_course_description" class="@error('english_banking_description')is-invalid @enderror form-control" placeholder="{{ $english_banking->english_banking_course_description }}" >
                        @error('english_banking_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of English Banking course </label>
                        <input type="number"  name="english_banking_course_price" class="@error('english_banking_course_price')is-invalid @enderror form-control" placeholder="{{ $english_banking->english_banking_course_price }}" >
                        @error('english_banking_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of English Banking course teacher </label>
                        <input type="text"  name="english_banking_course_teacher_name" class="@error('english_banking_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $english_banking->english_banking_course_teacher_name }}">
                        @error('english_banking_course_teacher_name')
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

