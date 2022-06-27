@extends('_layouts.Master')

@section('title')
Show Innovation Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Innovation as $innovation)
                     <tr>
                         <td>{{$innovation->innovation_course_name}}</td>
                         <td>{{$innovation->innovation_course_description}}</td>
                         <td>{{$innovation->innovation_course_price}}</td>
                         <td>{{$innovation->innovation_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$innovation->image) }}"></td>
                      <td>
                        <form action="index_innovation/{{$innovation->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_innovation/{{$innovation->id}}/edit_innovation_course">
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

