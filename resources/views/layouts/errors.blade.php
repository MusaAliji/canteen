@if ($errors->has($name) )
    <div class="alert alert-danger">
        <ul>
            <li>{{ $errors->first($name) }}</li>
        </ul>
    </div>
@endif