@extends('layouts.master')

@section('title')
Registered Roles | Laravel
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Registered Roles</h4>
          @if (session('status'))
                <div class="alert alert-success text-center font-weight-bold text-uppercase" role="alert">
                    {{ session('status') }}
                </div>
             @endif
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table  id="datatable" class="table table-hover">
              <thead class=" text-dark">
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">PHONE</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">USER TYPE</th>
                <th scope="">EDIT</th>
                <th scope="col">DELETE </th>
              </thead>
              <tbody>
                  @foreach ($users as $row)   
                <tr>
                  <th scope="row">{{ $row->id }}</th>  
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->usertype }}</td>
                  <td>
                  {{--   <a href="/role-edit/{{ $row->id }}"><i class="fa fa-edit text-success"></i></a> --}} 
                      ½ <a href="/role-edit/{{ $row->id }}"><i class="fas fa-pen-square fa-2x" style="color:#18CE0F;"></i></a>
                  </td>
                  <td>
                      <form action="/role-delete/{{ $row->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger deletebtn"><i class="far fa-trash-alt"></i></button>
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
@endsection