<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RouteController extends Controller
{
    public function index(): View
    {
        return view('routes.index', ['routes' => Route::paginate(6)]);
    }

    public function create(): View
    {
        return view('routes.store');
    }

    public function update(Route $route): View
    {
        $route = Route::where('code_route', $route);
        dd($route->code-route);
        return view('routes.update', $route);
    }

    public function destroy($route): RedirectResponse
    {
        Route::where('code_route', $route)->delete();

        return redirect()->route('routes');
    }

    public function store(Request $request): RedirectResponse
    {
        Route::create($request->all());

        return redirect()->route('routes');
    }

    public function patch(Request $request, Route $route): RedirectResponse
    {
        $route->update($request->all());

        return redirect()->route('routes');
    }
}
