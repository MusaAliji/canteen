@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Canteen</h1>

        <form action="/canteens" method="POST">
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="" required>
                @include('layouts.errors', ['name'=>'name'])
            </label>
            </div>

            @if(!$canteener)
            <div class="form-group">
            <label for="user"> Users
                <select name="user_id" required>
                    @foreach(\App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->name.' '.$user->surname}}</option>
                    @endforeach
                </select>
                @include('layouts.errors', ['name'=>'user_id'])
            </label>
            </div>
            @endif

            <div class="form-group">
            <label for="location"> Location
                <input type="text" class="form-control" name="location" value="" required>
                @include('layouts.errors', ['name'=>'location'])
            </label>
            </div>

            <div class="form-group">
            <label for="open"> Open
                <input type="time" class="form-control" name="open" value="" required>
                @include('layouts.errors', ['name'=>'open'])
            </label>
            </div>

            <div class="form-group">
            <label for="close"> Close
                <input type="time" class="form-control" name="close" value="" required>
                @include('layouts.errors', ['name'=>'close'])
            </label>
            </div>

            <label for="button">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
@endsection