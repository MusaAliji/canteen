@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Room</h1>

        <form action="/rooms/{{$room->id}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
            <label for="number"> Number
                <input type="text" class="form-control" name="number" value="{{$room->number}}" required>
            </label>
            </div>

            <div class="form-group">
                <label for="user"> User
                    <select name="user" required>
                        @foreach(\App\User::all() as $users)
                            @if($users->id == $room->user->id)
                                <option value="{{$users->id}}" selected>{{$users->name}}</option>
                            @else
                                <option value="{{$users->id}}">{{$users->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="department"> Department
                    <select name="department" required>
                        @foreach(\App\Department::all() as $department)
                            @if($department->id == $room->department->id)
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </label>
            </div>

            <label for="button">
            <input type="submit" value="Update" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
    @endsection