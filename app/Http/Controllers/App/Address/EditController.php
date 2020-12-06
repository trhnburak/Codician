<?php

namespace App\Http\Controllers\App\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Company;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $address = new Address();
        $address = $address->where('id', $id)->first();

        $company = new Company();
        $companies = $company->all();
        $company = $company->where('id', $address->company_id)->first();
        return view('app.address.edit')
            ->with('companyName', $company)
            ->with('companies', $companies)
            ->with('address', $address);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
            'companyName' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('address/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        $address = new Address();
        $company = Company::where('id', $request->companyName)->firstOrFail();
        $address->company()->associate($company);

        $address->where('id', $id)->update($data);

        return redirect()->route('address.show');
    }
}
