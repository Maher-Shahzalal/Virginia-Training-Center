@extends('_layouts.Master')

@section('title')
        Add English for IT Courses
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add English for IT Course</strong>
            </div>
            <div class="card-body card-block">
          <form method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
               <label for="media_image"> Name of English IT course </label>
                 <input type="text"  name="english_it_course_name" class="@error('english_it_course_name')is-invalid @enderror form-control" >
                 @error('english_it_course_name')
                   <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                  @enderror
               </div>
              <div class="form-group">
              <label for="media_image"> description of English IT course </label>
              <input type="text"  name="english_it_course_description" class="@error('english_it_course_description')is-invalid @enderror form-control" >
              @error('english_it_course_description')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Price of English IT course </label>
                <input type="number"  name="english_it_course_price" class="@error('english_it_course_price')is-invalid @enderror form-control" >
                @error('english_it_course_price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Name of English IT course teacher </label>
                <input type="text"  name="english_it_course_teacher_name" class="@error('english_it_course_teacher_name')is-invalid @enderror form-control" >
                @error('english_it_course_teacher_name')
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

