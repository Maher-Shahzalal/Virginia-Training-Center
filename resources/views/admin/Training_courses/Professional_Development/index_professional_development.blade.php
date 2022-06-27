@extends('_layouts.Master')

@section('title')
Show Professional Development Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Professional_Development as $professional_development)
                     <tr>
                         <td>{{$professional_development->professional_development_course_name}}</td>
                         <td>{{$professional_development->professional_development_course_description}}</td>
                         <td>{{$professional_development->professional_development_course_price}}</td>
                         <td>{{$professional_development->professional_development_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$professional_development->image) }}"></td>
                      <td>
                        <form action="index_professional_development/{{$professional_development->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_professional_development/{{$professional_development->id}}/edit_professional_development_course">
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

