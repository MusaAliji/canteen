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
                        <th>Canteen Name</th>
                        <th>Location</th>
                        <th>Open</th>
                        <th>Close</th>
                        @if($auth_user)
                            <th>Action</th>
                            @else
                        <th>Edit</th>
                        <th>Delete</th>
                            @endif
                        </thead>
                        <tbody>

                        @foreach($canteens as $canteen)
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>{{$canteen->name}}</td>
                            <td>{{$canteen->location}}</td>
                            <td @if(\Carbon\Carbon::now('Europe/Istanbul')->toTimeString()>=$canteen->open and \Carbon\Carbon::now('Europe/Istanbul')->toTimeString()<=$canteen->close ) bgcolor="#90ee90" @endif >{{$canteen->open}}</td>
                            <td @if(\Carbon\Carbon::now('Europe/Istanbul')->toTimeString()>=$canteen->close) bgcolor="#cd5c5c" @endif>{{$canteen->close}}</td>
                            @if($auth_user)
                                <td><p data-placement="top" data-toggle="tooltip"><a href="{{action('CanteenController@show',$canteen->id)}}"><button class="btn btn-primary btn-xs" data-title="Go to products" data-toggle="modal" data-target="#go_to_products" ><span class="glyphicon glyphicon-arrow-right"></span></button></a></p></td>
                            @else
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="{{action('CanteenController@edit',$canteen->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                            <td align="center">
                                <form action="{{action('CanteenController@destroy',$canteen->id)}}" method="POST">
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </p>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>

                    </table>

                    @if(!$auth_user)
                    <div>
                        <a href="{{url('/canteens/create')}}">Create New Canteen</a>
                    </div>
                    @endif

                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        {{$canteens->links()}}
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection