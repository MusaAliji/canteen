@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create User</h1>

        <form action="/users" method="POST">
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                @include('layouts.errors', ['name'=>'name'])
            </label>
            </div>

            <div class="form-group">
                <label for="surname"> Surname
                    <input type="text" class="form-control" name="surname" value="{{ old('surname') }}" required>
                    @include('layouts.errors', ['name'=>'surname'])
                </label>
            </div>

            <div class="form-group">
            <label for="degree"> Degree
                <select name="degree" id="">
                    <option value=""></option>
                    @foreach(\App\Degree::all() as $degree)
                        <option value="{{$degree->id}}">{{$degree->name}}</option>
                    @endforeach
                </select>
                @include('layouts.errors', ['name'=>'degree'])
            </label>
            </div>

            <div class="form-group">
                <label for="room"> Room No
                    <input type="number" class="form-control" name="room" value="{{ old('room') }}" >
                    @include('layouts.errors', ['name'=>'room'])
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

            <div class="form-group">
                <label for="phone"> Phone No
                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                    @include('layouts.errors', ['name'=>'phone'])
                </label>
            </div>

            <div class="form-group">
                <label for="email"> Email
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @include('layouts.errors', ['name'=>'email'])
                </label>
            </div>

            <div class="form-group">
                <label for="password"> Password
                    <input type="password" class="form-control" name="password" value="" required>

                </label>
            </div>

            <div class="form-group">
                <label for="password_confirmed"> Password Confirmation
                    <input type="password" class="form-control" name="password_confirmation" value="" required>
                    @include('layouts.errors', ['name'=>'password'])
                </label>
            </div>

            <label for="button">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
@endsection