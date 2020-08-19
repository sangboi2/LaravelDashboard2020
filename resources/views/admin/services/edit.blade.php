@extends('layouts.master')

@section('title')
Services Category - Edit | Laravel
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title text-dark">Services Category - Edit </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('category-update/'.$service_category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">   
                            <div class="form-group">
                                <label class="col-form-label">Service Cate Name</label>
                                <input type="text" name="service_name" class="form-control" value="{{  $service_category->service_name }}">
                            </div>  
                        </div>
                        <div class="col-md-12">   
                            <div class="form-group">
                                <label class="col-form-label">Service Cate Description</label>
                                <textarea type="text" name="service_description" class="form-control">{{  $service_category->service_description }}</textarea>
                            </div>  
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success float-right text-dark">Update Category</button>
                            <a href="{{ url('service-category') }}" class="btn btn-default float-right">Cancel</a>
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