@extends('layouts.master')

@section('title')
About Us | Laravel
@endsection
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title" id="exampleModalLabel">Add About Us</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/save-aboutus" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
          
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Title</label>
              <input type="text" name="title" class="form-control" id="recipient-name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Sub Title</label>
                <input type="text" name="subtitle" class="form-control" id="recipient-name">
              </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description</label>
              <textarea name="description" class="form-control" id="message-text"></textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

{{-- Delete Modal --}}
<!-- Modal -->
{{-- <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-light">
        <h5 class="modal-title" id="exampleModalLabel">Deletion data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="delete_modal_Form" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
        
        {{-- <div class="modal-body">
          <input type="text" id="delete_aboutus_id">
          <h5>Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Yes, delete it</button>
        </div>
      </form>
    </div>
  </div> 
</div> --}}
{{-- End Delete Modal --}}

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title"> About Us 
            <button type="button" class="btn btn-success btn-sm float-right text-capitalize text-dark" data-toggle="modal" data-target="#exampleModal">+ Create post</button>
          </h5>
            @if (session('status'))
                <div class="alert alert-success text-center font-weight-bold text-uppercase" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <style>
            .w-10p{
                width: 1% !important;
            }
        </style>       
        <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-hover">
              <thead class=" text-danger">
                <th class="w-10p" >ID</th>
                <th class="w-10p" >TITLE</th>
                <th class="w-10p" >SUB TITLE</th>
                <th class="w-10p" >DESCRIPTION</th>
                <th class="w-10p" >EDIT</th>
                <th class="w-10p" >DELETE</th>
              </thead>
              <tbody>
                  @foreach ($aboutus as $data)
                <tr>
                  <th scope="row">{{ $data->id }}</th>
                  <td>{{ $data->title }}</td>
                  <td>{{ $data->subtitle }}</td>
                  <td>
                    <div style="height:80px; overflow: hidden;">
                        {{ $data->description }}
                    </div>
                  </td>
                  <td>
                      <a href="{{ url('about-us/'.$data->id) }}" class="btn btn-success text-dark">Edit</a>
                  </td>
                  <td>
                      <form action="{{ url('about-us-delete/'.$data->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                      {{-- <a href="javascript:void(0)" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deletemodalpop">Delete</a> --}}
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
    <script>
      $(document).ready( function () {
          $('#datatable').DataTable();
         /*  $('#datatable').on('click','.deletebtn', function () {
             $tr = $(this).closest('tr');

             var data = $tr.children("td").map( function() {
               return $(this).text();
             }).get();

             //console.log(data);

             $('#delete_aboutus_id').val(data[0]);

             $('#delete_modal_Form').attr('action', '/about-us-delete/'+data[0]);

            //$('#deletemodalpop').modal('show');
          }); */
        });
    </script>
@endsection