@extends('_layouts.Master')

@section('title')
Show Teacher Training Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Teacher_Training as $teacher_training)
                     <tr>
                         <td>{{$teacher_training->teacher_training_course_name}}</td>
                         <td>{{$teacher_training->teacher_training_course_description}}</td>
                         <td>{{$teacher_training->teacher_training_course_price}}</td>
                         <td>{{$teacher_training->teacher_training_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$teacher_training->image) }}"></td>
                      <td>
                        <form action="index_teacher_training/{{$teacher_training->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_teacher_training/{{$teacher_training->id}}/edit_teacher_training_course">
                         <button class="btn btn-primary float-right btn-sm">Edit</button>
                         </form>
                     </td>
                    </tr>
                 @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection('content')

