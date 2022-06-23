@extends('app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <a type="button" class="btn btn-outline-primary" href="{{ route('showStoreSportsmen') }}" style="width: 100%">add new sportsman</a>
        <br>
        <form method="get" action="{{ route('sportsmen') }}" class="form-inline">
            @csrf
            <div id="input1" class="input-group mb-3">
                <span class="input-group-text">input first name</span>
                <input type="text" aria-label="Last name" class="form-control" name="first_name">
                <span class="input-group-text">input last name</span>
                <input type="text" aria-label="Last name" class="form-control" name="last_name">
            </div>
            <div id="input1" class="input-group mb-3">
                <span class="input-group-text">input category</span>
                <select class="form-select" aria-label="Default select example" name="category">
                    <option value="no_filter">no filter</option>
                    <option value="summer olympics">summer olympics</option>
                    <option value="winter olympics">winter olympics</option>
                    <option value="non-olympic">non-olympic</option>
                </select>
                <button type="submit" style="color: green; border-color: green"  class="btn btn-outline-primary">Apply Filter</button>
            </div>
        </form>
        <br>
    <br>
    @if(count($sportsmen))
        <h3>{{$count}} @if($count==1) sportiv gasit @else sportivi gasiti @endif</h3>
    <table id="customers">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>gen</th>
            <th>Age</th>
            <th>Height (kg)</th>
            <th>Weight (cm)</th>
            <th>Competition</th>
            <th>Update sportsman</th>
            <th>Delete sportsma</th>
        </tr>
        @foreach($sportsmen as $sportsman)
            <tr class="busy">
                <td>{{$sportsman->first_name}}</td>
                <td>{{$sportsman->last_name}}</td>
                <td>{{$sportsman->gen}}</td>
                <td>{{$sportsman->age}}</td>
                <td>{{$sportsman->height}}</td>
                <td>{{$sportsman->weight}}</td>
                <td>{{  \App\Models\Competition::where('id', $sportsman->competition_id)->value('name') }}</td>
                <td><a type="button" class="btn btn-outline-primary" href="{{ route('showUpdateSportsmen',$sportsman->id) }}">Update</a></td>
                <td><form method="post" action="{{ route('destroySportsmen',$sportsman->id) }}">@csrf<button type="submit" style="color: red; border-color: red"  class="btn btn-outline-primary">Delete</button></form></td>
            </tr>
        @endforeach
    </table>
    <span>{{$sportsmen->links('pagination::bootstrap-5')}}</span>
    @else
        <h1>No matches</h1>
    @endif
@endsection

