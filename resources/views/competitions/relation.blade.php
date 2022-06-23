@extends('app')

@section('content')
    @if(count($sportsmen))
    <table id="customers">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>gen</th>
            <th>Age</th>
            <th>Height (cm)</th>
            <th>Weight (kg)</th>
        </tr>
        @foreach($sportsmen as $sportsman)
            <tr class="busy">
                <td>{{$sportsman->first_name}}</td>
                <td>{{$sportsman->last_name}}</td>
                <td>{{$sportsman->gen}}</td>
                <td>{{$sportsman->age}}</td>
                <td>{{$sportsman->height}}</td>
                <td>{{$sportsman->weight}}</td>
            </tr>
        @endforeach
    </table>
    @else
        <h1>No matches</h1>
    @endif
@endsection

