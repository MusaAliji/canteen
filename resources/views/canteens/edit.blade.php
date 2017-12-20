@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Canteen</h1>

        <form action="/canteens/{{$canteen->id}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="{{$canteen->name}}" required>
            </label>
            </div>

            @if(!$canteener)
            <div class="form-group">
            <label for="user"> User
                <select name="user_id" required>
                    @foreach(\App\Canteen::all() as $canteens)
                        @if($canteens->id == $canteen->id)
                            <option value="{{$canteens->user->id}}" selected>{{$canteens->user->name}}</option>
                            @else
                            <option value="{{$canteens->user->id}}">{{$canteens->user->name}}</option>
                        @endif
                        @endforeach
                </select>
            </label>
            </div>
            @endif

            <div class="form-group">
            <label for="location"> Location
                <input type="text" class="form-control" name="location" value="{{$canteen->location}}" required>
            </label>
            </div>

            <div class="form-group">
            <label for="open"> Open
                <input type="time" class="form-control" name="open" value="{{$canteen->open}}" required>
            </label>
            </div>

            <div class="form-group">
            <label for="close"> Close
                <input type="time" class="form-control" name="close" value="{{$canteen->close}}" required>
            </label>
            </div>

            <label for="button">
            <input type="submit" value="Update" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
    @endsection