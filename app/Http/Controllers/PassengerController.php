<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PassengerController extends Controller
{
    public function index(): View
    {
        return view('passengers.index', ['passenger' => Passenger::paginate(6)]);
    }

    public function create(): View
    {
        return view('passengers.store');
    }

    public function update($passenger): View
    {
        return view('passengers.update', $passenger);
    }

    public function destroy($passenger): RedirectResponse
    {
        Passenger::where('code_passenger', $passenger)->delete();

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
}
