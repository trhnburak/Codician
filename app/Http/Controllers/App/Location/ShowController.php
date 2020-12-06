<?php


namespace App\Http\Controllers\App\Location;

use App\Http\Controllers\Controller;
use App\Models\Address;


class ShowController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('app.location.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLocation()
    {
        $locations = Address::all();
        return response()->json($locations);
    }
}
