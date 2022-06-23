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
    <form method="post" action="{{ route('storeCompetition')}}" >
        @csrf
        <div id="input1" class="input-group mb-3">
            <span class="input-group-text">name</span>
            <input type="text" aria-label="Last name" class="form-control" name="name">
            <span class="input-group-text">category</span>
            <select class="form-select" aria-label="Default select example" name="category">
                <option value="summer olympics">summer olympics</option>
                <option value="winter olympics">winter olympics</option>
                <option value="non-olympic">non-olympic</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="add">Create</button>
        </div>
    </form>
@endsection
