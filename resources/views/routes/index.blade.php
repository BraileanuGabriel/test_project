@extends('app')

@section('content')
    <main class="px-12" style="width: 150%">
        <a type="button" class="btn btn-outline-primary" href="{{ route('showStoreRoute') }}">add new route</a>
            <div class="row">
                @foreach($routes as $route)
                    <div class="col-sm-4">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{ $route->destination }}</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">{{ $route->price }} <small class="text-muted fw-light">lei/kg</small></h1>
                            <div class="btn-group" role="group">
                                <a href="{{ route('showUpdateRoute',$route->code_route) }}"><button type="button" id="edit" class="w-100 btn btn-lg btn-outline-primary">Update</button></a>
                                <form method="post" action="{{ route('destroyRoute',$route->code_route) }}">@csrf<button type="submit" id="fav"  class="w-100 btn btn-lg btn-outline-primary">Delete</button></form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <span>{{$routes->links('pagination::bootstrap-5')}}</span>
    </main>
@endsection

