<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class LoanDetailsController extends Controller
{
    public function index()
    {
        return view('dashboard');

    }
    public function getLoanDetails(Request $request)
    {
        try {
            $loanDetails = LoanDetail::getCachedLoanDetails();
            $loanDetails = collect($loanDetails->toArray());
            return DataTables::of($loanDetails)->toJson();
        } catch (\Exception $e) {
            Log::error('Error fetching loan details: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching loan details.'], 500);
        }

    }
}
