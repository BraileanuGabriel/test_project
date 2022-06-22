@extends('app')

@section('content')
    <a type="button" class="btn btn-outline-primary" href="{{ route('showStorePassenger') }}" style="width: 100%">add new passenger</a>
    <br>
    <form method="get" action="{{ route('passengers') }}" class="form-inline">
        @csrf
        <div id="input1" class="input-group mb-3">
            <select name="destination" class="form-select">
                <option value="no_filter">no filter</option>
                @foreach($destinations as $destination)
                    <option value="{{ $destination }}" @if($destination == $selected_destination) selected @endif>
                        {{ $destination }}
                    </option>
                @endforeach
            </select>
            <select name="class" class="form-select">
                <option value="no_filter">no filter</option>
                @foreach($classes as $class)
                    <option value="{{ $class }}" @if($class == $selected_class) selected @endif>
                        {{ $class }}
                    </option>
                @endforeach
            </select>
            <button type="submit" style="color: green; border-color: green"  class="btn btn-outline-primary">Apply Filter</button>
        </div>
    </form>
    <br>
    <table id="customers">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Contact</th>
            <th>Registred routes</th>
            <th>Update user</th>
            <th>Delete user</th>
        </tr>
        @foreach($passengers as $passenger)
            <tr class="busy">
                <td>{{$passenger->first_name}}</td>
                <td>{{$passenger->last_name}}</td>
                <td>{{$passenger->contact}}</td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('singlePassenger',$passenger->id) }}">see user routes</a></td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('showUpdatePassenger',$passenger->id) }}">Update</a></td>
                <td><form method="post" action="{{ route('destroyPassenger',$passenger->id) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
            </tr>
        @endforeach
    </table>
@endsection

