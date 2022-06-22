@extends('app')

@section('content')
    <form method="post" action="{{ route('updatePassenger', $passenger->id)}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">new first name</span>
            <input type="text" aria-label="Last name" class="form-control" name="first_name" value="{{$passenger->first_name}}">
            <span class="input-group-text">new last name</span>
            <input type="text" aria-label="Last name" class="form-control" name="last_name" value="{{$passenger->last_name}}">
            <span class="input-group-text">new contact</span>
            <input type="number" aria-label="Last name" class="form-control" name="contact" value="{{$passenger->contact}}">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Update</button>
        </div>
    </form>
@endsection
