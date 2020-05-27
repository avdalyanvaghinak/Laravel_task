@extends('layouts.master')


@section('title')
    Product Show
@endsection



@section('content')
    {{--Add form--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/save-product" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Price:</label>
                            <input type="text" name="price" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Country:</label>
                            <input type="text" name="country" class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Age:</label>
                            <input type="text" name="age" class="form-control" id="recipient-name">
                        </div>


                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="">Select a Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @if ($category->children)
                                        @foreach ($category->children as $child)
                                            <option value="{{ $child->id }}" {{ $child->id === old('category_id') ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Image:</label>
                            <input type="file" name="image"  class="form-control" id="recipient-name">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{--    Add Form end--}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Products
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal">ADD
                        </button>
                    </h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <style>
                    .x-10p {
                        width: 10% | important;
                    }
                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th class="x-10p">Id</th>
                            <th class="x-10p">Title</th>
{{--                            <th class="x-10p">Category</th>--}}
                            <th class="x-10p">Price</th>
                            <th class="x-10p">Country</th>
                            <th class="x-10p">Age</th>
                            <th class="x-10p">Image</th>
                            <th class="x-10p">Description</th>
                            <th class="x-10p">EDIT</th>
                            <th class="x-10p">DELETE</th>
                            </thead>
                            <tbody>
                            @foreach($products as $date)
                                <tr>
                                    <td>{{$date->id}}</td>
                                    <td>{{$date->title}}</td>
                                    <td>{{$date->price}}</td>
                                    <td>{{$date->country}}</td>
                                    <td>{{$date->age}}</td>
                                    <td>
                                        @if ($date->image)
                                            <img src="/images/{{$date->image}}"/>

                                          @endif
                                    </td>
                                    <div style="height: 10px; overflow: hidden">
                                        <td>{{$date->description}}</td>
                                    </div>
                                    <td><a href="{{url('product-edit/'.$date->id)}}" class="btn btn-success">EDIT</a></td>

                                    <td>
                                        <form action="{{url('/product-delete/'.$date->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger">DELETE</button>
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

@endsection

