@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Manage Product Table</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                   <tbody>
                   @php $i=1 @endphp
                   @foreach($products as $product)
                   <tr>
                       <td>{{$i++}}</td>
                       <td>{{$product->product_name}}</td>
                       <td>{{$product->category_name}}</td>
                       <td>{{$product->brand_name}}</td>
                       <td>{{$product->price}}</td>
                       <td>{{$product->description}}</td>
                       <td>
                           <img src="{{asset($product->image)}}" style="width: 50px;height: 50px;"alt="">
                       </td>
                       <td>{{$product->status==1?'Published':'Unpublished'}}</td>
                       <td>
                           @if($product->status==1)
                               <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-outline-danger">Unpublished</a>
                           @else
                               <a href="{{route('status',['id'=>$product->id])}}" class="btn btn-outline-primary">Published</a>
                           @endif
                               <a href="{{route('edit-product',['id'=>$product->id])}}" class=" btn btn-outline-primary" title="Edit">Edit</a>
                               <a>
                                   <form action="{{route('delete-product')}}" method="post">
                                       @csrf
                                       <input type="hidden" name="product_id" value="{{$product->id}}">
                                       <input type="submit" value="Delete" class="btn btn-outline-danger"title="Delete" onclick="return confirm('Are you sure delete this')">
                                   </form>
                               </a>
                       </td>
                   </tr>
                   @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
