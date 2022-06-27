@extends('_layouts.Master')

@section('title')
Show Emails of Newsletter Courses
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>ID</th><th>Email</th><th>Action</th></thead>
                  <tbodey>
                     @foreach($Newsletter as $newsletter)
                     <tr>
                         <td>{{$oetItem->id}}</td>
                         <td>{{$oetItem->email}}</td>
                      <td>
                        <form action="index_oet/{{$oetItem->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                     </td>
                    </tr>
                 @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection('content')

