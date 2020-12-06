<?php

namespace App\Http\Controllers\App\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Anam\PhantomMagick;
class CreateController extends Controller
{
    /**
     * Create page
     *
     * @return mixed
     */
    public function create()
    {
        return view('app.company.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required',
            'webSite' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('company/create')
                ->withErrors($validator)
                ->withInput();
        }

        $company = new Company();

        $company->company_name = $request->companyName;
        $company->web_site = $request->webSite;
        $company->html = file_get_contents($request->webSite);
        $conv = new PhantomMagick\Converter();
        $conv->setBinary('/phantomjs/binary/path/phantomjs');

        $conv->source($request->webSite)
            ->toPng()
            ->save($request->companyName);


        if ($company->save()) {
            return redirect()->route('company.show');
        }
    }
}
