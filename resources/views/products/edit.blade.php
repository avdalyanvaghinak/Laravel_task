@extends('layouts.master')


@section('title')
    Product Edit
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Products Edit</h4>

                    <form action="{{url('product-update/'.$products->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Title:</label>
                                <input type="text" name="title" class="form-control" value="{{$products->title}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Price:</label>
                                <input type="text" name="price" class="form-control" value="{{$products->price}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Country:</label>
                                <input type="text" name="country" class="form-control" value="{{$products->country}}">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Age:</label>
                                <input type="text" name="age" class="form-control" value="{{$products->age}}">
                            </div>


                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select a Category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id === $products->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @if ($category->children)
                                            @foreach ($category->children as $child)
                                                <option value="{{ $child->id }}" {{ $child->id === $products->category_id ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Image:</label>
                                @if ($products->image)
                                    <ul>
                                        <li>{{ $products->image }}</li>
                                    </ul>
                                @endif
                                <input type="file" name="image"  class="form-control" >
                            </div>

                           <div class="form-group">
                                <label for="message-text" class="col-form-label">Description:</label>
                                <textarea name="description" class="form-control" id="message-text" rows="6" cols="5">{{$products->description}}</textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="{{url('/product')}}" class="btn btn-secondary">BACK</a>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


@endsection
