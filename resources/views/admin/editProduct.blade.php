@extends('layouts.admin')

@section('title') Edit Product @endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Edit Product
                        </div>
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('adminEditProduct', $product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Thumbnail</label>
                                            <input type="file" name="thumbnail" id="normal-input" class="form-control" placeholder="Post title">
                                        </div>
                                        <img src="{{ asset($product->thumbnail) }}" width="100" alt="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input name="title" value="{{$product->title}}" id="normal-input" class="form-control" placeholder="Post title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="placeholder-input" class="form-control-label">Description</label>
                                            <textarea class="form-control" name="description" placeholder="Product Description" id="" cols="30" rows="10">{{$product->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Price</label>
                                            <input value="{{$product->price}}" name="price" id="normal-input" class="form-control" placeholder="10.00">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection