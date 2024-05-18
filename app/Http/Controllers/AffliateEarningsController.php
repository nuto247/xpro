<?php

namespace App\Http\Controllers;

use App\Models\Refferal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffliateEarningsController extends Controller
{
    public function list()
    {
        $affliateEarnings = Refferal::where('user_id', Auth::id())->get();

        return view('affliate_earnings', compact('affliateEarnings'));

    }
    
}
