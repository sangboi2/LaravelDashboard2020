@extends('layouts.master')

@section('title')
Services Category | Laravel
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services Category
                        <a href="{{ url('services-create') }}" class="btn btn-sm btn-success py-2 float-right text-dark">+ Add</a>
                    </h3>
                    @if (session('status'))
                        <div class="alert alert-success text-center font-weight-bold text-uppercase" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-respsonsive">
                        <table class="table table-hover">
                        <thead class=" text-danger">
                          <tr>
                              
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                          <tr>
                            <input type="hidden" class="service_val_id" value="{{ $item->id }}">
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->service_name }}</td>
                            <td>{{ $item->service_description }}</td>
                            <td>
                                <a href="{{ url('service-cate-edit/'.$item->id) }}" class="btn btn-success text-dark">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('service-category-delete/'.$item->id) }}"  method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                
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
    });
</script>

{{--     <script>
      $(document).ready(function () {
          $('.servicedeletebtn').click(function (e) { 
              e.preventDefault();
            //alert(delete_id);

            var delete_id = $(this).closest("tr").find('.service_val_id').val(); 

           // alert(delete_id);


             swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                                "_token": $('input[name=_token]').val,
                                "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/service-cate-delete/'+delete_id,
                            data: data,
                            success: function (response) {

                                swal(response.status, {
                                        icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                                
                            }
                        });
    
                    } 
                }); 
              
          });
      });
    </script> --}}
@endsection