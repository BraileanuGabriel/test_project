@extends('app')

@section('content')
    <form method="post" action="{{ route('storePassenger')}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">First name</span>
            <input type="text" aria-label="Last name" class="form-control" name="first_name">
            <span class="input-group-text">Last name</span>
            <input type="text" aria-label="Last name" class="form-control" name="last_name">
            <span class="input-group-text">Contact</span>
            <input type="number" aria-label="Last name" class="form-control" name="contact">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Create</button>
        </div>
    </form>
@endsection
