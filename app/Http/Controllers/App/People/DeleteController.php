<?php

namespace App\Http\Controllers\App\People;

use App\Http\Controllers\Controller;
use App\Models\People;


class DeleteController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke($id)
    {
        $people = new People();
        $people->where('id', $id)->delete();
        return redirect()->route('people.show');
    }

}
