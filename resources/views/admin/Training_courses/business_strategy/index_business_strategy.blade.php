@extends('_layouts.Master')

@section('title')
Show Business Strategy Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Description</th><th>Price</th><th>Teacher</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Business_strategy as $business_strategy)
                     <tr>
                         <td>{{$business_strategy->business_strategy_course_name}}</td>
                         <td>{{$business_strategy->business_strategy_course_description}}</td>
                         <td>{{$business_strategy->business_strategy_course_price}}</td>
                         <td>{{$business_strategy->business_strategy_course_teacher_name}}</td>
                      <td><img src="{{ asset('storage/'.$business_strategy->image) }}"></td>
                      <td>
                        <form action="index_business_strategy/{{$business_strategy->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_business_strategy/{{$business_strategy->id}}/edit_business_strategy_course">
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

