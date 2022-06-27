@extends('_layouts.Master')

@section('title')
Add IELTS Course
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add IELTS Course</strong>
            </div>
            <div class="card-body card-block">
          <form method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
               <label for="media_image"> Name of IELTS course </label>
                 <input type="text"  name="ielts_course_name" class="@error('ielts_course_name')is-invalid @enderror form-control" >
                 @error('ielts_course_name')
                   <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                  @enderror
               </div>
              <div class="form-group">
              <label for="media_image"> description of IELTS course </label>
              <input type="text"  name="ielts_course_description" class="@error('ielts_course_description')is-invalid @enderror form-control" >
              @error('ielts_course_description')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Price of IELTS course </label>
                <input type="number"  name="ielts_course_price" class="@error('ielts_course_price')is-invalid @enderror form-control" >
                @error('ielts_course_price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="media_image"> Name of IELTS course teacher </label>
                <input type="text"  name="ielts_course_teacher_name" class="@error('ielts_course_teacher_name')is-invalid @enderror form-control" >
                @error('ielts_course_teacher_name')
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

