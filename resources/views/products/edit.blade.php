@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Canteen</h1>

        <form action="/products/{{$product->id}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
            </label>
            </div>

            <div class="form-group">
            <label for="price"> Price
                <input type="text" class="form-control" name="price" value="{{$product->price}}" required>
            </label>
            </div>

            <label for="button">
            <input type="submit" value="Update" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
    @endsection