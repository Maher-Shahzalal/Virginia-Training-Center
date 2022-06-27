@extends('_layouts.Master')

@section('title')
Show English Banking Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($English_banking as $english_banking)
                     <tr>
                         <td>{{$english_banking->english_banking_course_name}}</td>
                         <td>{{$english_banking->english_banking_course_description}}</td>
                         <td>{{$english_banking->english_banking_course_price}}</td>
                         <td>{{$english_banking->english_banking_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$english_banking->image) }}"></td>
                      <td>
                        <form action="index_english_banking/{{$english_banking->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_english_banking/{{$english_banking->id}}/edit_english_banking_course">
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

