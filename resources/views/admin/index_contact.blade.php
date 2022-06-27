@extends('_layouts.Master')

@section('title')
Show Contacts
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Contact as $contactItem)
                     <tr>
                         <td>{{$contactItem->contact_name}}</td>
                         <td>{{$contactItem->contact_email}}</td>
                         <td>{{$contactItem->contact_subject}}</td>
                         <td>{{$contactItem->contact_message}}</td>
                      <td>
                        <form action="index_contact/{{$contactItem->id}}/delete">
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

