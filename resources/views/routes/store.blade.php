@extends('app')

@section('content')
    <form method="post" action="{{ route('storeRoute')}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">Destination of the route</span>
            <input type="text" aria-label="Last name" class="form-control" name="destination">
            <span class="input-group-text">Class</span>
            <select class="form-select" aria-label="Default select example">
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
            </select>
            <span class="input-group-text">Price</span>
            <input type="number" aria-label="Last name" class="form-control" name="price">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Create</button>
        </div>
    </form>
@endsection
