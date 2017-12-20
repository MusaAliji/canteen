@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Product to Canteen</h1>

        <form action="/canteens/{{$canteen->id}}" method="POST">
            {{csrf_field()}}
            <input type="hidden" name="canteen" value="{{$canteen->id}}">

            <div class="form-group">
                <label for="name"> Name
                    <input type="text" class="form-control" name="name" value="" required>
                    @include('layouts.errors', ['name'=>'name'])
                </label>
            </div>

            <div class="form-group">
                <label for="kind"> Kind
                    <select name="kind" id="">
                        @foreach(\App\Kind::all() as $kind)
                            <option value="{{$kind->id}}">{{$kind->name}}</option>
                        @endforeach
                    </select>
                    @include('layouts.errors', ['name'=>'name'])
                </label>
            </div>

            <div class="form-group">
                <label for="price"> Price
                    <input type="text" class="form-control" name="price" value="" required>
                    @include('layouts.errors', ['name'=>'price'])
                </label>
            </div>

            <div class="form-group">
                <label for="image"> Image
                    <input type="file" class="form-control" name="image" value="">
                    @include('layouts.errors', ['name'=>'image'])
                </label>
            </div>

            <label for="button">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
@endsection