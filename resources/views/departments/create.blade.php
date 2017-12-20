@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Canteen</h1>

        <form action="/departments" method="POST">
            {{csrf_field()}}

            <div class="form-group">
            <label for="name"> Department Name
                <input type="text" class="form-control" name="name" value="" required>
                @include('layouts.errors', ['name'=>'name'])
            </label>
            </div>

            <div class="form-group">
                <label for="name"> Faculty
                    <input type="text" class="form-control" name="faculty" value="" required>
                    @include('layouts.errors', ['name'=>'faculty'])
                </label>
            </div>

            <label for="button">
                <input type="submit" value="Create" class="form-control btn btn-primary">
            </label>
        </form>
    </div>
@endsection