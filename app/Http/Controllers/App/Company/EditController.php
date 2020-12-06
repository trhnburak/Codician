<?php

namespace App\Http\Controllers\App\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
        $company = new Company();
        $company = $company->where('id', $id)->first();
        return view('app.company.edit')
            ->with('company', $company);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'webSite' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('company/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'company_name' => $request->companyName,
            'web_site' => $request->webSite
        ];
        $company = new Company();

        $company->where('id', $id)->update($data);

        return redirect()->route('company.show');
    }
}
