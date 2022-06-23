@extends('app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('updateSportsmen',$sportsman->id )}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">New first name</span>
            <input type="text" aria-label="Last name" class="form-control" name="first_name" value="{{ $sportsman->first_name }}">
            <span class="input-group-text">New last name</span>
            <input type="text" aria-label="Last name" class="form-control" name="last_name" value="{{ $sportsman->last_name }}">
            <span class="input-group-text">New age</span>
            <input type="number" aria-label="Last name" class="form-control" name="age" value="{{ $sportsman->age }}">
            <span class="input-group-text">New gen</span>
            <input type="text" aria-label="Last name" class="form-control" name="gen" value="{{ $sportsman->gen }}">
        </div>
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">New weight</span>
            <input type="number" aria-label="Last name" class="form-control" name="weight" value="{{ $sportsman->weight }}">
            <span class="input-group-text">New height</span>
            <input type="number" aria-label="Last name" class="form-control" name="height" value="{{ $sportsman->height }}">
            <select class="form-select" aria-label="Default select example" name="competition_id">
                @foreach($competitions as $competition)
                    <option value="{{ $competition->id }}" @if($competition->id == $sportsman->competition_id) selected @endif>
                        {{ $competition->name }} {{ $competition->caetgory }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Update</button>
        </div>
    </form>
@endsection
