<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // return view('landing');
        $shops = Shop::query()->latest()->paginate(8);
        return view('landing', compact('shops'));
    }
}
