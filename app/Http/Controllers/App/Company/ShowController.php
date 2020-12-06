<?php


namespace App\Http\Controllers\App\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;


class ShowController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $companies = Company::all();
        return view('app.company.index')->with('companies', $companies);
    }

}
