@extends('app')

@section('content')
    <a type="button" class="btn btn-outline-primary" href="{{ route('showStoreCompetition') }}" style="width: 100%">add new competition</a>

    <br>
    @if(count($competitions))
    <table id="customers">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Number of Sportsman</th>
            <th>See competition sportsmen</th>
            <th>Update competition</th>
            <th>Delete competition</th>
        </tr>
        @foreach($competitions as $competition)
            <tr class="busy">
                <td>{{$competition->name}}</td>
                <td>{{$competition->category}}</td>
                <td>{{ \App\Models\Sportsman::where('competition_id', $competition->id)->count() }}</td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('singleCompetition',$competition->id) }}">see participants</a></td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('showUpdateCompetition',$competition->id) }}">Update</a></td>
                <td><form method="post" action="{{ route('destroyCompetition',$competition->id) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
            </tr>
        @endforeach
    </table>
    <span>{{$competitions->links('pagination::bootstrap-5')}}</span>
    @else
        <h1>No matches</h1>
    @endif
@endsection

