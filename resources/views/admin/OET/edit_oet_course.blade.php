@extends('_layouts.Master')

@section('title')
    Edit OET Course
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit OET Course</strong>
            </div>
            @foreach($Oet as $oetItem)
            <div class="card-body card-block">
                <form action="../{{$oetItem->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Name of OET course </label>
                        <input type="text"  name="oet_course_name" class="@error('oet_course_name')is-invalid @enderror form-control" placeholder="{{ $oetItem->oet_course_name }}" >
                        @error('oet_course_name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > description of OET course </label>
                        <input type="text"  name="oet_course_description" class="@error('oet_course_description')is-invalid @enderror form-control" placeholder="{{ $oetItem->oet_course_description }}" >
                        @error('oet_course_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Price of OET course </label>
                        <input type="number"  name="oet_course_price" class="@error('oet_course_price')is-invalid @enderror form-control" placeholder="{{ $oetItem->oet_course_price }}" >
                        @error('oet_course_price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="media_image"> Name of OET course teacher </label>
                        <input type="text"  name="oet_course_teacher_name" class="@error('oet_course_teacher_name')is-invalid @enderror form-control" placeholder="{{ $oetItem->oet_course_teacher_name }}">
                        @error('oet_course_teacher_name')
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

