@extends('_layouts.Master')

@section('title')
Add PTE Course
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add PTE Course</strong>
            </div>
            <div class="card-body card-block">
          <form  method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="form-group">
               <label > Name of PTE course </label>
                 <input type="text"  name="pte_course_name" class="@error('pte_course_name')is-invalid @enderror form-control" >
                 @error('pte_course_name')
                   <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                  @enderror
               </div>
              <div class="form-group">
              <label > description of PTE course </label>
              <input type="text"  name="pte_course_description" class="@error('pte_course_description')is-invalid @enderror form-control" >
              @error('pte_course_description')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
                @enderror
              </div>
              <div class="form-group">
                <label > Price of PTE course </label>
                <input type="number"  name="pte_course_price" class="@error('pte_course_price')is-invalid @enderror form-control" >
                @error('pte_course_price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label > Name of PTE course teacher </label>
                <input type="text"  name="pte_course_teacher_name" class="@error('pte_course_teacher_name')is-invalid @enderror form-control" >
                @error('pte_course_teacher_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                    <label > Upload Image </label>
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

