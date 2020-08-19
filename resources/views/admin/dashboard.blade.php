@extends('layouts.master')

@section('title')
Dashboard | Laravel
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-uppercase"> Employee Information</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class=" text-danger">
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">COUNTRY</th>
                <th scope="col">CITY</th>
                <th scope="col">SALARY</th>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Philip Thang</td>
                  <td>Denmark</td>
                  <td>Esbjerg</td>
                  <td>20000DKK</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Peter Lund</td>
                  <td>Denmark</td>
                  <td>Odense</td>
                  <td>20000DKK</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Kim Hansen</td>
                  <td>Norway</td>
                  <td>Sandness</td>
                  <td>30000DKK</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td >John Doe</td>
                  <td>Sweden</td>
                  <td>Malmø</td>
                  <td>40000DKK</td>
                </tr>
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