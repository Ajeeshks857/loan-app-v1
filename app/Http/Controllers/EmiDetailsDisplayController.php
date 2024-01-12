<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmiDetailsDisplayController extends Controller
{
   public function index()
    {
        $emiDetails = DB::table('emi_details')->get();
        return view('emi_details_display.index', compact('emiDetails'));
    }
}
