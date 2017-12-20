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
                        <th>Degree</th>
                        <th>Name Surname</th>
                        <th>Email</th>
                        <th>Room No</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                @if(is_null($user->degree_id))
                                    <td></td>
                                @else
                                    <td>{{$user->degree->name}}.</td>
                                @endif
                                <td>{{$user->name.' '.$user->surname}}</td>
                                <td>{{$user->email}}</td>
                               @if(\App\Room::where('user_id',$user->id)->first()==null)
                                   <td></td>
                                @else
                                   <td>{{$user->room->number}}</td>
                                @endif
                                @if(\App\Room::where('user_id',$user->id)->first()==null)
                                    <td></td>
                                @else
                                    <td>{{$user->room->department->name}}</td>
                                @endif
                                <td>{{$user->phone}}</td>
                                <td><p data-placement="top" data-toggle="tooltip" ><a href="{{action('UserController@edit',$user->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                                <td>
                                    <form action="{{action('UserController@destroy',$user->id)}}" method="POST">
                                        <p data-placement="top" data-toggle="tooltip">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                    <div>
                        <a href="{{url('/users/create')}}">Create New User</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection