@extends('_layouts.Master')

@section('title')
Show TOFEL Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Tofel as $tofelItem)
                     <tr>
                         <td>{{$tofelItem->tofel_course_name}}</td>
                         <td>{{$tofelItem->tofel_course_description}}</td>
                         <td>{{$tofelItem->tofel_course_price}}</td>
                         <td>{{$tofelItem->tofel_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$tofelItem->image) }}"></td>
                      <td>
                        <form action="index_tofel/{{$tofelItem->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_tofel/{{$tofelItem->id}}/edit_tofel_course">
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

