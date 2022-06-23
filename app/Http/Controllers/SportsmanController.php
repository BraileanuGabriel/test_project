<?php

namespace App\Http\Controllers;

use App\Http\Requests\SportsmenRequest;
use App\Models\Competition;
use App\Models\Sportsman;
use App\Models\Travel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SportsmanController extends Controller
{
    public function index(Request $request): View
    {
        if($request->category && $request->category != 'no_filter'){
            $categories = Competition::where('category', $request->category)->pluck('id');
        }

        if($request->first_name && $request->first_name != "" && (!$request->last_name || $request->last_name == '')){
            if($request->category && $request->category != 'no_filter'){
                $data = Sportsman::where('first_name', $request->first_name)->whereIn('competition_id', $categories);
            } else if($request->category == 'no_filter'){
                $data = Sportsman::where('first_name', $request->first_name);
            }

        } else if($request->last_name && $request->last_name != "" && (!$request->first_name || $request->first_name == '')){

            if($request->category && $request->category != 'no_filter'){
                $data = Sportsman::where('last_name', $request->last_name)->whereIn('competition_id', $categories);
                $count = $data->count();

            } else if($request->category == 'no_filter'){
                $data = Sportsman::where('last_name', $request->last_name);
                $count = $data->count();
            }

        } else if($request->last_name && $request->last_name != "" && $request->first_name && $request->first_name != ""){
            if($request->category && $request->category != 'no_filter'){
                $data = Sportsman::where('last_name', $request->last_name)->where('first_name', $request->first_name)->whereIn('competition_id', $categories);
            } else if($request->category == 'no_filter'){
                $data = Sportsman::where('last_name', $request->last_name);
            }
        }

        else{
            if($request->category && $request->category != 'no_filter') {
                $data = Sportsman::whereIn('competition_id', $categories);
            } else {
                $count = Sportsman::count();
                $data = Sportsman::where('id', '>=', 0);
            }
        }
        return view('sportsmen.index', ['sportsmen' => $data->paginate(6), 'count' => $count ?? $data->count()]);
    }

    public function create(): View
    {
        return view('sportsmen.store', ['competitions' => Competition::all()]);
    }

    public function update(Sportsman $sportsman): View
    {
        return view('sportsmen.update', ['sportsman' => $sportsman, 'competitions' => Competition::all()]);
    }

    public function destroy(Sportsman $sportsman): RedirectResponse
    {
        $sportsman->delete();

        return redirect()->route('sportsmen');
    }

    public function store(SportsmenRequest $request): RedirectResponse
    {
        Sportsman::create($request->all());

        return redirect()->route('sportsmen');
    }

    public function patch(SportsmenRequest $request, Sportsman $sportsman): RedirectResponse
    {
        $sportsman->update($request->all());

        return redirect()->route('sportsmen');
    }
}
