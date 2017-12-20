@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Room</h1>

        <form action="/rooms" method="POST">
            {{csrf_field()}}

            <div class="form-group">
            <label for="number"> Number
                <input type="number" class="form-control" name="number" value="" required>
                @include('layouts.errors', ['name'=>'number'])
            </label>
            </div>

            <div class="form-group">
            <label for="users"> Users
                <select name="user" id="">
                    <option value=""></option>
                    @foreach(\App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->name.' '.$user->surname}}</option>
                    @endforeach
                </select>
                @include('layouts.errors', ['name'=>'user'])
            </label>
            </div>

            <div class="form-group">
                <label for="departments"> Departments
                    <select name="department" id="">
                        <option value=""></option>
                        @foreach(\App\Department::all() as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                    @include('layouts.errors', ['name'=>'department'])
                </label>
            </div>

            <label for="button">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
@endsection