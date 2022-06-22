@extends('app')

@section('content')
    <a type="button" class="btn btn-outline-primary" href="{{ route('showStoreRoute') }}" style="width: 100%">add new route</a>
    <br>
    <table id="customers">
        <tr>
            <th>Destination</th>
            <th>Class</th>
            <th>Price</th>
            <th>Budget</th>
            <th>Registred passengers</th>
            <th>Update route</th>
            <th>Delete route</th>
        </tr>
        @foreach($routes as $route)
            <tr class="busy">
                <td>{{$route->destination}}</td>
                <td>{{$route->class}}</td>
                <td>{{$route->price}} lei</td>
                <td>{{count($route->passengers)*$route->price}} lei</td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('singleRoute',$route->id) }}">see route passengers</a></td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('showUpdateRoute',$route->id) }}">Update</a></td>
                <td><form method="post" action="{{ route('destroyRoute',$route->id) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
            </tr>
        @endforeach
    </table>
    <span>{{$routes->links('pagination::bootstrap-5')}}</span>
@endsection

