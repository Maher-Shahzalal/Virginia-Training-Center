@extends('_layouts.Master')

@section('title')
Show HR Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($HR as $hr)
                     <tr>
                         <td>{{$hr->hr_course_name}}</td>
                         <td>{{$hr->hr_course_description}}</td>
                         <td>{{$hr->hr_course_price}}</td>
                         <td>{{$hr->hr_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$hr->image) }}"></td>
                      <td>
                        <form action="index_hr/{{$hr->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_hr/{{$hr->id}}/edit_hr_course">
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

