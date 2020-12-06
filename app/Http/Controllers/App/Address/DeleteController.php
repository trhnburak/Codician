<?php

namespace App\Http\Controllers\App\Address;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\People;


class DeleteController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($id)
    {
        $address = new Address();
        $address->where('id', $id)->delete();
        return redirect()->route('address.show');
    }

}
