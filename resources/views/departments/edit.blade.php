@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Canteen</h1>

        <form action="/departments/{{$department->id}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="{{$department->name}}" required>
            </label>
            </div>

            <div class="form-group">
                <label for="faculty"> Faculty
                    <input type="text" class="form-control" name="faculty" value="{{$department->faculty}}" required>
                </label>
            </div>

            <label for="button">
            <input type="submit" value="Update" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
    @endsection