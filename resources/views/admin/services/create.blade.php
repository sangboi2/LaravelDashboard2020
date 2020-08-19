@extends('layouts.master')

@section('title')
Services Category | Laravel
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services Category -Add
                        <a href="{{ url('service-category') }}" class="btn btn-sm btn-success py-2 float-right text-dark">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('category-store') }}" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-md-6">   
                                <div class="form-group">
                                    <label class="col-form-label">Service Cate Name</label>
                                    <input type="text" name="service_name" class="form-control" placeholder="Enter Service Name">
                                </div>  
                            </div>
                            <div class="col-md-12">   
                                <div class="form-group">
                                    <label class="col-form-label">Service Cate Description</label>
                                    <textarea type="text" name="service_description" class="form-control" placeholder="Enter Service Description"></textarea>
                                </div>  
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success float-right text-dark">Save</button>
                            </div>
                        </div>
                    </form>
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