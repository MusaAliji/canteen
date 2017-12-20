@extends('layouts.app')

@section('content')

    <div class="container">
        {{--table--}}
        <div class="row">


            <div class="col-md-12">
                <h4>Bootstrap Snipp for Datatable</h4>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>

                        <th><input type="checkbox" id="checkall" /></th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        @if($auth_user)
                           <th>Action</th>
                        @else
                        <th>Edit</th>
                        <th>Delete</th>
                            @endif
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td><img src="data:image/png;base64,{{base64_encode($product->image)}}"  alt="{{$product->name}}" height="30px" width="30px"></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->pivot->stock}}</td>
                                <!-- Here is not done order for users-->
                                @if($auth_user)
                                    <td>
                                    <form action="/orderstore" method="POST">
                                        <p data-placement="top" data-toggle="tooltip">
                                            {{csrf_field()}}
                                            <input type="hidden" name="canteen" value="{{$canteen->id}}">
                                            <input type="hidden" name="product" value="{{$product->id}}">
                                            <button class="btn btn-primary btn-xs" data-title="Go to products" data-toggle="modal" data-target="#go_to_products" ><span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                                    </form>
                                    </td>
                                @else
                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="{{action('ProductController@edit',$product->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                                <td>
                                    <form action="{{action('ProductController@destroy',$product->id)}}" method="POST">
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </form>
                                </td>
                                    @endif
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    @if(!$auth_user)
                    <div>
                        <a href="{{url('/canteens/'.$canteen->id.'/create_product')}}">Create New Product</a>
                    </div>
                    @endif


                </div>

            </div>
        </div>
    </div>
@endsection