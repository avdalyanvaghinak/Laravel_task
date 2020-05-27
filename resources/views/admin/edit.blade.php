@extends('layouts.master')


@section('title')
    Register
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Registerd User</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <form action="/role-update/{{$users->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}

                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" class="form-control" name="username"
                                               value="{{$users->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label>User Type</label>
                                        <select name="user_type" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="vendor">Vendor</option>
                                            <option value="menejer">Menejer</option>
                                            <option value="varord">Varord</option>
                                            <option value="">None</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/role-register" class="btn btn-danger">Cansel</a>
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



