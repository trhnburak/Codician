<?php


namespace App\Http\Controllers\App\Home;

use App\Http\Controllers\Controller;
use App\Models\Address;


class ShowController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('app.home.index');
    }



}
