<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;
use Illuminate\Support\Facades\DB;

class ProcessDataController extends Controller
{
    public function index()
    {
        return view('emi-processing.index');
    }

    public function processData()
    {

        DB::statement('DROP TABLE IF EXISTS emi_details');
        $minMaxDates = LoanDetail::selectRaw('MIN(first_payment_date) as min_date, MAX(last_payment_date) as max_date')
            ->first();

        $query       = 'CREATE TABLE emi_details (clientid INT';
        $currentDate = new \DateTime($minMaxDates->min_date);

        while ($currentDate <= new \DateTime($minMaxDates->max_date)) {
            $columnName = $currentDate->format('Y_M');
            $query .= ", $columnName DECIMAL(10,2) DEFAULT 0.00";
            $currentDate->modify('+1 month');
        }

        $query .= ')';
        DB::statement($query);
        $loanDetails = LoanDetail::get();

        foreach ($loanDetails as $loan) {
            $emiAmount   = $loan->loan_amount / $loan->num_of_payment;
            $currentDate = new \DateTime($loan->first_payment_date);
            $updateQuery = 'INSERT INTO emi_details (clientid';
            $values      = "VALUES ($loan->clientid";
            while ($currentDate <= new \DateTime($loan->last_payment_date)) {
                $columnName = $currentDate->format('Y_M');
                $updateQuery .= ", $columnName";
                $values .= ", $emiAmount";
                $currentDate->modify('+1 month');
            }
            $updateQuery .= ") $values)";
            DB::statement($updateQuery);
        }
        $emiDetails = DB::table('emi_details')->get();
        return view('emi_details_display.index', compact('emiDetails'))
            ->with('success', 'EMI Processing completed successfully');
    }

}
