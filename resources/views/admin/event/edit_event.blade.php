@extends('_layouts.Master')

@section('title')
    Edit Event
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Edit Event</strong>
            </div>
            @foreach($Event as $eventItem)
            <div class="card-body card-block">
                <form action="../{{$eventItem->id}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label > Title of Event </label>
                        <input type="text"  name="event_title" class="@error('event_title')is-invalid @enderror form-control" placeholder="{{ $eventItem->ielts_course_name }}" >
                        @error('event_title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label> Description of Event </label>
                        <input type="text"  name="event_description" class="@error('event_description')is-invalid @enderror form-control" placeholder="{{ $eventItem->ielts_course_description }}" >
                        @error('event_description')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label > Date of event </label>
                        <input type="date"  name="event_date" class="@error('event_date')is-invalid @enderror form-control" placeholder="{{ $eventItem->ielts_ielts_course_price }}" >
                        @error('event_date')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
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

