<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Route;
use App\Models\Travel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function index(): View
    {
        return view('routes.index', ['routes' => Route::paginate(6)]);
    }

    public function passengersRoute(Route $route): View
    {
        return view('routes.index', ['passengers' => $route->travel()->passengers()]);
    }

    public function create(): View
    {
        return view('routes.store');
    }

    public function update(Route $route): View
    {
        return view('routes.update', ['route' => $route]);
    }

    public function destroy(Route $route): RedirectResponse
    {
        $route->delete();

        return redirect()->route('routes');
    }

    public function store(Request $request): RedirectResponse
    {
        Route::create($request->all());

        return redirect()->route('routes');
    }

    public function patch(Request $request, Route $route): RedirectResponse
    {
        $route->update([
            'destination' => $request->destination,
            'class' => $request->class,
            'price' => $request->price
        ]);

        return redirect()->route('routes');
    }

    public function show(Route $route): View
    {
        $passengers = Passenger::whereNotIn('id', $route->passengers()->pluck('passenger_id'))->get();
        return view('routes.relation', ['route_pass' => $passengers, 'route' => $route]);
    }

    public function addToRoute(Request $request, Route $route): RedirectResponse
    {
        Travel::create([
            'passenger_id' => $request->id_user,
            'route_id' => $route->id,
        ]);

        return redirect()->route('singleRoute', ['route' => $route]);
    }

    public function deleteFromRoute(Request $request, Route $route): RedirectResponse
    {
        Travel::where([
            'passenger_id' => $request->id_user,
            'route_id' => $route->id,
        ])->delete();
        return redirect()->route('singleRoute', ['route' => $route]);
    }

}
