<?php

namespace App\Http\Controllers\App\People;

use App\Http\Controllers\Controller;
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
        $people = new People();
        $people = $people->where('id', $id)->first();

        $company = new Company();
        $companies = $company->all();
        $company = $company->where('id', $people->company_id)->first();
        return view('app.people.edit')
            ->with('companyName', $company)
            ->with('companies', $companies)
            ->with('people', $people);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'companyName' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('people/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'title' => $request->title,
            'name' => $request->name,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        $people = new People();
        $company = Company::where('id', $request->companyName)->firstOrFail();
        $people->company()->associate($company);

        $people->where('id', $id)->update($data);

        return redirect()->route('people.show');
    }
}
