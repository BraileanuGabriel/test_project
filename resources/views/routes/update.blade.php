@extends('app')

@section('content')
    <form method="post" action="{{ route('updateRoute',$route->code_route )}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">What new destination for this route?</span>
            <input type="text" aria-label="Last name" class="form-control" name="name" value="{{ $route->destination }}">
            <span class="input-group-text">What is the new class?</span>
            <select class="form-select" aria-label="Default select example" name="destination">
                <option value="I" @if($route->class == 'I') selected @endif>I</option>
                <option value="II" @if($route->class == 'II') selected @endif>II</option>
                <option value="III" @if($route->class == 'III') selected @endif>III</option>
            </select>
            <input type="number" aria-label="Last name" class="form-control" name="class" value="{{ $route->class }}">
            <span class="input-group-text">What is the new price?</span>
            <input type="number" aria-label="Last name" class="form-control" name="price" value="{{ $route->price }}">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Update</button>
        </div>
    </form>
@endsection
