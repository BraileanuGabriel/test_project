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
    <form method="post" action="{{ route('storeSportsmen')}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">First name</span>
            <input type="text" aria-label="Last name" class="form-control" name="first_name">
            <span class="input-group-text">Last name</span>
            <input type="text" aria-label="Last name" class="form-control" name="last_name">
            <span class="input-group-text">Age</span>
            <input type="number" aria-label="Last name" class="form-control" name="age">
            <span class="input-group-text">Gen</span>
            <input type="text" aria-label="Last name" class="form-control" name="gen">
        </div>
        <br>
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">Weight</span>
            <input type="number" aria-label="Last name" class="form-control" name="weight">
            <span class="input-group-text">Height</span>
            <input type="number" aria-label="Last name" class="form-control" name="height">
            <span class="input-group-text">Competition</span>
            <select class="form-select" aria-label="Default select example" name="competition_id">
                @foreach($competitions as $competition)
                    <option value="{{ $competition->id }}">
                        {{ $competition->name }} {{ $competition->caetgory }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Create</button>
        </div>
    </form>
@endsection
