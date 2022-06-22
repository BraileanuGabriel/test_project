<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Route;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PassengerController extends Controller
{
    public function index(Request $request): View
    {
        $data = Passenger::paginate(6);
        if($request->destination && $request->destination != "no_filter" && (!$request->class || $request->class == 'no_filter')){
            $data = Passenger::whereHas('routes', function (Builder $query) use ($request) {
                $query->where('destination', 'like', $request->destination);
            })->paginate(6);
        } else if($request->class && $request->class != "no_filter" && (!$request->destination || $request->destination == 'no_filter')){
            $data = Passenger::whereHas('routes', function (Builder $query) use ($request) {
                $query->where('class', 'like', $request->class);
            })->paginate(6);
        } else if($request->class && $request->class != "no_filter" && $request->destination && $request->destination != "no filter"){
            $data = Passenger::whereHas('routes', function (Builder $query) use ($request) {
                $query->where('class', 'like', $request->class)
                    ->where('destination', 'like', $request->destination);
            })->paginate(6);
        }

        $destinations = Route::groupBy('destination')->pluck('destination');
        $classes = Route::groupBy('class')->pluck('class');

        return view('passengers.index', [
            'passengers' => $data,
            'destinations' => $destinations,
            'classes' => $classes,
            'selected_destination' => $request->destination ?? null,
            'selected_class' => $request->class ?? null,
        ]);
    }

    public function create(): View
    {
        return view('passengers.store');
    }

    public function update(Passenger $passenger): View
    {
        return view('passengers.update', ['passenger' => $passenger]);
    }

    public function destroy(Passenger $passenger): RedirectResponse
    {
        $passenger->delete();

        return redirect()->route('passengers');
    }

    public function store(Request $request): RedirectResponse
    {
        Passenger::create($request->all());

        return redirect()->route('passengers');
    }

    public function patch(Request $request, Passenger $passenger): RedirectResponse
    {
        $passenger->update($request->all());

        return redirect()->route('passengers');
    }

    public function show(Passenger $passenger): View
    {
        $routes = Route::whereNotIn('id', $passenger->routes()->pluck('route_id'))->get();
        return view('passengers.relation', ['pass_routes' => $routes, 'passenger' => $passenger]);
    }

    public function addToUser(Request $request, Passenger $passenger): RedirectResponse
    {
        Travel::create([
            'passenger_id' => $passenger->id,
            'route_id' => $request->id_route,
        ]);

        return redirect()->route('singlePassenger', ['passenger' => $passenger]);
    }

    public function deleteFromUser(Request $request, Passenger $passenger): RedirectResponse
    {
        Travel::where([
            'passenger_id' => $passenger->id,
            'route_id' => $request->id_route,
        ])->delete();

        return redirect()->route('singlePassenger', ['passenger' => $passenger]);
    }
}
