<?php


namespace App\Http\Controllers\App\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Company;
use App\Models\People;


class ShowController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        $address = Address::all();
        return view('app.address.index')->with('addresses', $address);
    }

}
