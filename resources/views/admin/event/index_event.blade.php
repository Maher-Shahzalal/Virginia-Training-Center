@extends('_layouts.Master')

@section('title')
Show Event
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Title</th><th>Description</th><th>Date</th><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Event as $eventItem)
                     <tr>
                         <td>{{$eventItem->event_title}}</td>
                         <td>{{$eventItem->event_description}}</td>
                         <td>{{$eventItem->event_date}}</td>
                      <td><img src="{{ asset('storage/'.$eventItem->image) }}"></td>
                      <td>
                        <form action="index_event/{{$eventItem->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_event/{{$eventItem->id}}/edit_event">
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

