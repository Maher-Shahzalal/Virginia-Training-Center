@extends('_layouts.Master')

@section('title')
        Add Business English Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add Business English Course</strong>
            </div>
            <div class="card-body card-block">
          <form method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
               <label for="media_image"> Name of Business English course </label>
                 <input type="text"  name="business_english_course_name" class="@error('business_english_course_name')is-invalid @enderror form-control" >
                 @error('business_english_course_name')
                   <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                  @enderror
               </div>
              <div class="form-group">
              <label for="media_image"> description of Business English course </label>
              <input type="text"  name="business_english_course_description" class="@error('business_english_course_description')is-invalid @enderror form-control" >
              @error('business_english_course_description')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Price of Business English course </label>
                <input type="number"  name="business_english_course_price" class="@error('business_english_course_price')is-invalid @enderror form-control" >
                @error('business_english_course_price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Name of Business English course teacher </label>
                <input type="text"  name="business_english_course_teacher_name" class="@error('business_english_course_teacher_name')is-invalid @enderror form-control" >
                @error('business_english_course_teacher_name')
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
                      <i class="fa fa-dot-circle-o">Add</i>
                  </button>
              </div>
         </form>
     </div>
</div>
@endsection('content')

