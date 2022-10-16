@extends('admin.master')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Product Edit Form</h3></div>
                    <div class="card-body">
                        <form action="{{route('update-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="row mb-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" type="text"value="{{$product->product_name}}" name="product_name" placeholder="Enter Product Name" />
                                    <label for="inputFirstName">Product Name</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="inputFirstName" name="category_name" value="{{$product->category_name}}" type="text" placeholder="Enter Category Name" />
                                        <label for="inputFirstName">Category Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" id="inputLastName" name="brand_name"value="{{$product->brand_name}}" type="text" placeholder="Enter Brand Name" />
                                        <label for="inputLastName">Brand Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" name="price" value="{{$product->price}}"type="text" placeholder="Price" />
                                <label for="inputEmail">Price</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="inputEmail" name="description" type="text" placeholder="Description" rows="10" cols="50">{{$product->description}}</textarea>
                                <label for="inputEmail">Description</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" name="image" type="file" />
                                <img src="{{asset($product->image)}}" style="width: 50px;height: 50px;"alt="">
                            </div>
                            <div class="card-footer text-center py-3">
                                <input type="submit" value="Submit" class=" btn btn-outline-primary form-control">
                                </input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

