@extends('app')

@section('content')
    <form method="post" action="{{ route('addUserToRoute',$route->id) }}" class="form-inline">
        @csrf
        <div id="input1" class="input-group mb-3">
            <select name="id_user" class="form-select">
                @foreach($route_pass as $pass)
                    <option value="{{ $pass->id }}">
                        {{ $pass->first_name }} {{ $pass->last_name }}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit" style="color: green; border-color: green"  class="btn btn-outline-primary">Add new passenger</button>
        </div>
    </form>
    <br>
   <table id="customers">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Contact</th>
            <th>Delete passenger from route</th>
        </tr>
        @foreach($route->passengers as $passenger)
            <tr class="busy">
                <td>{{$passenger->first_name}}</td>
                <td>{{$passenger->last_name}}</td>
                <td>{{$passenger->contact}}</td>
                <td><form method="post" action="{{ route('deleteUserFromRoute',['route' => $route->id, 'id_user' => $passenger->id]) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
            </tr>
        @endforeach
    </table>
@endsection

