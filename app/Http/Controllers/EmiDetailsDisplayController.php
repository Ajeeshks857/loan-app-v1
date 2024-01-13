<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EmiDetailsDisplayController extends Controller
{
    public function index()
    {
        try {
            $emiDetails = DB::table('emi_details')->paginate(100);
            return view('emi_details_display.index', compact('emiDetails'));
        } catch (QueryException $e) {
            return response()->view('error_page', ['error' => 'An error occurred while fetching data.']);
        }
    }
}
