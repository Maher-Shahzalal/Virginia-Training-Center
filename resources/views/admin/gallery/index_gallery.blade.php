@extends('_layouts.Master')

@section('title')
Show Gallery Images
@endsection

@section('content')
    <div class="row m-t-10">
        <div class="col-sm-12 col-md-9">
            <div class="table-responsive m-b-10">
                <table class="table table-borderless table-data3">
               <thead><th>Image</th><th>Actions</th></thead>
                  <tbodey>
                     @foreach($Gallery as $galleryItem)
                     <tr>
                      <td><img src="{{ asset('storage/'.$galleryItem->image) }}"></td>
                      <td>
                        <form action="index_gallery/{{$galleryItem->id}}/delete">
                          <button class="btn btn-danger float-right btn-sm">Delete</button>
                        </form>
                         <form action="index_gallery/{{$galleryItem->id}}/edit_gallery_image">
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

