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
                        <th>Kinds Name</th>
                        <th>Edit</th>

                        <th>Delete</th>
                        </thead>
                        <tbody>

                        @foreach($kinds as $kind)
                        <tr>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>{{$kind->name}}</td>

                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="{{action('KindController@edit',$kind->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                            <td>
                                <form action="{{action('KindController@destroy',$kind->id)}}" method="POST">
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
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
                        <a href="{{url('/kinds/create')}}">Create New Kind of product</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection