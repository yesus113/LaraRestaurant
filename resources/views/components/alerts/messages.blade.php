@if ($message = Session::get('success'))
    <div style="padding: 15px; background-color: green; color: black;">
        <p>{{$message}}</p>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div style="padding: 15px; background-color: red; color: black;">
        <p>{{$message}}</p>
    </div>
@endif

@if ($message = Session::get('update'))
    <div style="padding: 15px; background-color: yellow; color: black;">
        <p>{{$message}}</p>
    </div>
@endif
