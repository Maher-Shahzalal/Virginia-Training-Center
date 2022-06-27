@extends('_layouts.Master')

@section('title')
Show Business Ethics Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Business_ethics as $business_ethics)
                     <tr>
                         <td>{{$business_ethics->business_ethics_course_name}}</td>
                         <td>{{$business_ethics->business_ethics_course_description}}</td>
                         <td>{{$business_ethics->business_ethics_course_price}}</td>
                         <td>{{$business_ethics->business_ethics_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$business_ethics->image) }}"></td>
                      <td>
                        <form action="index_business_ethics/{{$business_ethics->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_business_ethics/{{$business_ethics->id}}/edit_business_ethics_course">
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

