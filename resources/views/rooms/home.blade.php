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
                        <th>Number</th>
                        <th>User Name</th>
                        <th>Department</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>
                        <tbody>

                        @foreach($rooms as $room)
                            <tr>
                                <td><input type="checkbox" class="checkthis" /></td>
                                <td>{{$room->number}}</td>
                                <td>{{$room->user->name.' '.$room->user->surname}}</td>
                                <td>{{$room->department->name}}</td>
                                <td><p data-placement="top" data-toggle="tooltip" ><a href="{{action('RoomController@edit',$room->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                                <td>
                                    <form action="{{action('RoomController@destroy',$room->id)}}" method="POST">
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
                        <a href="{{url('/rooms/create')}}">Create New Room</a>
                    </div>


                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        {{--{{$products->links()}}--}}
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection