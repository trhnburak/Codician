<?php


namespace App\Http\Controllers\App\People;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\People;


class ShowController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $people = People::all();
        return view('app.people.index')->with('people', $people);
    }

}
