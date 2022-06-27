@extends('_layouts.Master')

@section('title')
    Edit TOFEL Course
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit TOFEL Course</strong>
            </div>
            @foreach($Tofel as $tofelItem)
            <div class="card-body card-block">
                <form action="../{{$tofelItem->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of TOFEL course </label>
                        <input type="text"  name="tofel_course_name" class="@error('tofel_course_name')is-invalid @enderror form-control" placeholder="{{ $tofelItem->tofel_course_name }}" >
                        @error('ielts_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of TOFEL course </label>
                        <input type="text"  name="tofel_course_description" class="@error('tofel_course_description')is-invalid @enderror form-control" placeholder="{{ $tofelItem->tofel_course_description }}" >
                        @error('tofel_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of TOFEL course </label>
                        <input type="number"  name="tofel_course_price" class="@error('tofel_course_price')is-invalid @enderror form-control" placeholder="{{ $tofelItem->tofel_course_price }}" >
                        @error('tofel_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of TOFEL course teacher </label>
                        <input type="text"  name="tofel_course_teacher_name" class="@error('tofel_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $tofelItem->tofel_course_teacher_name }}">
                        @error('tofel_course_teacher_name')
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

