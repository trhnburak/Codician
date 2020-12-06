<?php

namespace App\Http\Controllers\App\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;


class DeleteController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($id)
    {
        $company = new Company();
        $company->where('id', $id)->delete();
        return redirect()->route('company.show');
    }

}
