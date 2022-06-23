<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetitionRequest;
use App\Models\Competition;
use App\Models\Sportsman;
use App\Models\Travel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompetitionController extends Controller
{
    public function index(Request $request): View
    {
        return view('competitions.index', ['competitions' => Competition::paginate(6)]);
    }

    public function create(): View
    {
        return view('competitions.store');
    }

    public function update(Competition $competition): View
    {
        return view('competitions.update', ['competition' => $competition]);
    }

    public function destroy(Competition $competition): RedirectResponse
    {
        Sportsman::where('competition_id', $competition->id)->update(['competition_id' => null]);

        $competition->delete();

        return redirect()->route('competitions');
    }

    public function store(CompetitionRequest $request): RedirectResponse
    {
        Competition::create($request->all());

        return redirect()->route('competitions');
    }

    public function patch(CompetitionRequest $request, Competition $competition): RedirectResponse
    {

        $competition->update($request->all());

        return redirect()->route('competitions');
    }

    public function show(Competition $competition):View
    {
        $sportsmen = Sportsman::where('competition_id', $competition->id)->get();
        return view('competitions.relation', ['sportsmen' => $sportsmen]);
    }
}
