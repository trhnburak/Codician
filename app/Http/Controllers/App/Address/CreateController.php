<?php

namespace App\Http\Controllers\App\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
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
        return view('app.address.create')->with('companies', $companies);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
            'companyName' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('address/create')
                ->withErrors($validator)
                ->withInput();
        }

        $address = new Address();
        $company = Company::where('id', $request->companyName)->firstOrFail();

        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;


        $address->company()->associate($company);

        if ($address->save()) {
            return redirect()->route('address.show');
        }
    }
}
