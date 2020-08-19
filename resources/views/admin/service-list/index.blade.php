@extends('layouts.master')

@section('title')
Services Category -List | Laravel
@endsection
@section('content')
<!-- Modal -->
<div class="modal fade" id="servicelistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel text-dark">Service List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ url('/servicelist-add') }}" method="post">
          {{ csrf_field() }}
          <div class="modal-body">
              <div class="form-group">
                <label for="">Service Category</label>
                <select name="serv_cate_id" class="form-control" required>
                  <option value="">-- Select Service Category --</option>
                   @foreach ($categories as $item)
                       <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                   @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="">ServiceList Name</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Title/Service Name">
              </div>
              <div class="form-group">
                <label for="">ServiceList Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="">ServiceList Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="">ServiceList Duration</label>
                <input type="text" name="duration" class="form-control" placeholder="Enter Duration">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success text-dark">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services Category - List
                        <a href="" class="btn btn-sm btn-success py-2 float-right text-dark" data-toggle="modal" data-target="#servicelistmodal">+ Add</a>
                    </h3>
                          @if (session('status'))
                              <div class="alert alert-success text-center font-weight-bold    text-uppercase" role="alert">
                              {{ session('status') }}
                            </div>
                          @endif
                </div>
                <div class="card-body">
                  <div class="table-respsonsive">
                      <table id="datatable" class="table table-hover">
                      <thead class=" text-danger">
                        <tr>       
                          <th scope="col">ID</th>
                          <th scope="col">SERV-CATE</th>
                          <th scope="col">NAME</th>
                          <th scope="col">DESCRIPTION</th>
                          <th scope="col">PRICE</th>
                          <th scope="col">DURATION</th>
                          <th scope="col">EDIT</th>
                          <th scope="col">DELETE</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($service_list as $item)
                          <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->categories->service_name }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>
                                <a href="{{ url('/service-list-edit/'.$item->id) }}" class="btn btn-success text-dark">Edit</a>
                            </td>
                            <td>
                                <form action="{{ url('/servicelist-delete/'.$item->id) }} "  method="POST">
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