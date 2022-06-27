@extends('_layouts.Master')

@section('title')
Show Digital Marketing Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Digital_Marketing as $digital_marketing)
                     <tr>
                         <td>{{$digital_marketing->digital_marketing_course_name}}</td>
                         <td>{{$digital_marketing->digital_marketing_course_description}}</td>
                         <td>{{$digital_marketing->digital_marketing_course_price}}</td>
                         <td>{{$digital_marketing->digital_marketing_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$digital_marketing->image) }}"></td>
                      <td>
                        <form action="index_digital_marketing/{{$digital_marketing->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_digital_marketing/{{$digital_marketing->id}}/edit_digital_marketing_course">
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

