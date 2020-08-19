@extends('layouts.master')

@section('title')
Edit-Registered| Laravel
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-light">
                    <h3 class="text-dark">Edit role for Registered user</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/role-register-update/{{ $users->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="username" value="{{ $users->name }}" class="form-control">  
                                </div>
                                <div class="form-group">
                                    <label>Give a Role</label>
                                    <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="vendor">Normal User</option>
                                        <option value="">None</option>
                                    </select> 
                                </div>
                                <button type="submit" class="btn btn-success float-right text-dark">Update</button>
                                <a href="/role-register" class="btn btn-default float-right">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section('scripts')
    
@endsection