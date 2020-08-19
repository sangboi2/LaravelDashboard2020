@extends('layouts.master')

@section('title')
Services Category -List | Laravel
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Services Category - List Edit</h3>
                      @if (session('status'))
                          <div class="alert alert-success text-center font-weight-bold    text-uppercase" role="alert">
                          {{ session('status') }}
                        </div>
                      @endif
            </div>
            <div class="card-body">
                <form action="{{ url('/servicelist-update/'.$ser_list->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="">Service Category</label>
                          <select name="serv_cate_id" class="form-control" required>
                            <option value="{{ $ser_list->serv_cate_id }}">{{  $ser_list->categories->service_name }}</option>
                             @foreach ($categories as $item)
                                 <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                             @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">ServiceList Name</label>
                          <input type="text" name="title" class="form-control" value="{{  $ser_list->title }}" placeholder="Enter Title/Service Name">
                        </div>
                        <div class="form-group">
                          <label for="">ServiceList Description</label>
                          <textarea name="description" class="form-control"  rows="3">{{  $ser_list->description }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="">ServiceList Price</label>
                          <input type="number" name="price" class="form-control" value="{{  $ser_list->price }}" placeholder="Enter Price">
                        </div>
                        <div class="form-group">
                          <label for="">ServiceList Duration</label>
                          <input type="text" name="duration" class="form-control" value="{{  $ser_list->duration }}" placeholder="Enter Duration">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success text-dark">Update Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection