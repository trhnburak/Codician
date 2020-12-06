<?php

namespace App\Http\Controllers\App\People;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $companies = Company::all();
        return view('app.people.create')->with('companies', $companies);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'companyName' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('people/create')
                ->withErrors($validator)
                ->withInput();
        }

        $people = new People();
        $company = Company::where('id', $request->companyName)->firstOrFail();

        $people->title = $request->title;
        $people->name = $request->name;
        $people->last_name = $request->lastName;
        $people->email = $request->email;
        $people->phone = $request->phone;

        $people->company()->associate($company);

        if ($people->save()) {
            return redirect()->route('people.show');
        }
    }
}
