@extends('app')

@section('content')
    <form method="post" action="{{ route('addRouteToUser',$passenger->id) }}" class="form-inline">
        @csrf
        <div id="input1" class="input-group mb-3">
            <select name="id_route" class="form-select">
                @foreach($pass_routes as $route)
                    <option value="{{ $route->id }}">
                        {{ $route->destination }}, clasa {{ $route->class }}, pret : {{ $route->price }} lei
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" style="color: green; border-color: green"  class="btn btn-outline-primary">Add new route</button>
        </div>
    </form>
    <br>
    <table id="customers">
        <tr>
            <th>Destination</th>
            <th>Class</th>
            <th>Price</th>
            <th>Delete route from passenger</th>
        </tr>
        @foreach($passenger->routes as $route)
            <tr class="busy">
                <td>{{$route->destination}}</td>
                <td>{{$route->class}}</td>
                <td>{{$route->price}}</td>
                <td><form method="post" action="{{ route('deleteRouteFromUser',['passenger' => $passenger->id, 'id_route' => $route->id]) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
           </tr>
        @endforeach
    </table>
@endsection

