<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProcessDataController extends Controller
{
    public function index()
    {
        return view('emi-processing.index');
    }

    public function processData()
    {
        try {

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

            LoanDetail::chunk(100, function ($loanDetails) {
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

            });

            return redirect()->route('emi-details-display.index')->with('success', 'EMI Processing completed successfully');

        } catch (\Exception $e) {
            Log::error('Error processing EMI details: ' . $e->getMessage());

            return redirect()->route('emi-details-display.index')
                ->with('error', 'An error occurred while processing EMI details. Please check the logs for more information.');
        }
    }

}
