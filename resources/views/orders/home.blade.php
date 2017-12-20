@extends('layouts.app')

@section('content')

    <div class="container">
        {{--table--}}
        <div class="row">


            <div class="col-md-12">
                <h4>Bootstrap Snipp for Datatable</h4>
                <div class="table-responsive">

                    <notifications :unreads="{{auth()->user()->unreadNotifications}}" :userid="{{auth()->id()}}"></notifications>

                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        {{--{{$products->links()}}--}}
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection