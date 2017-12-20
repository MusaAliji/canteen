@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        <form action="/users/{{$user->id}}" method="POST">
            {{method_field('PUT')}}
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Name
                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
            </label>
            </div>

            <div class="form-group">
                <label for="surname"> Surname
                    <input type="text" class="form-control" name="surname" value="{{$user->surname}}" required>
                </label>
            </div>

            <div class="form-group">
                <label for="email"> email
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                </label>
            </div>

            <div class="form-group">
                <label for="degree"> Degree
                    <select name="degree">
                        @if(is_null($user->degree_id))
                            <option value=""></option>
                            @foreach(\App\Degree::all() as $degree)
                                <option value="{{$degree->id}}">{{$degree->name}}</option>
                            @endforeach
                            @else
                            @foreach(\App\Degree::all() as $degree)
                                @if($degree->id == $user->degree->id)
                                    <option value="{{$degree->id}}" selected>{{$degree->name}}</option>
                                @else
                                    <option value="{{$degree->id}}" >{{$degree->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="room"> Room
                    <select name="room">
                        @if(\App\Room::where('user_id',$user->id)->first()==null)
                            <option value=""></option>
                            @foreach(\App\Room::all() as $room)
                                <option value="{{$room->number}}">{{$room->number}}</option>
                            @endforeach
                        @else
                            @foreach(\App\Room::select('number')->groupBy('number')->get() as $room)
                                @if($room->id == $user->room->id)
                                    <option value="{{$room->number}}" selected>{{$room->number}}</option>
                                @else
                                    <option value="{{$room->number}}" >{{$room->number}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="department"> Department
                    <select name="department">
                        @if(\App\Room::where('user_id',$user->id)->first()==null)
                            <option value=""></option>
                            @foreach(\App\Department::all() as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        @else
                            @foreach(\App\Department::all() as $department)
                                @if($department->id == $user->room->department_id)
                                    <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                @else
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </label>
            </div>

            <div class="form-group">
                <label for="phone"> Phone
                    <input type="number" class="form-control" name="phone" value="{{$user->phone}}">
                </label>
            </div>

            <label for="button">
            <input type="submit" value="Update" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
    @endsection