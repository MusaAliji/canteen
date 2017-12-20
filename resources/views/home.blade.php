@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div>
                        <ul>
                        @foreach($products as $product)
                            <li>
                                {{$product->name}}</br>
                                <ul>
                                @foreach($product->canteen as $canteen)
                                            <li>
                                                    {{$canteen->name}}
                                                <a href="{{action('HomeController@store',['canteens'=>$canteen->id,'product'=>$canteen->pivot['product_id']])}}">
                                                    <button type="submit" class="btn btn-default">Siparis Ver</button>
                                                </a>
                                            </li>
                                @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
