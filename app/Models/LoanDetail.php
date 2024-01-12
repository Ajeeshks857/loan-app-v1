<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'clientid',
        'num_of_payment',
        'first_payment_date',
        'last_payment_date',
        'loan_amount',
    ];

    public static function getCachedLoanDetails()
    {

        return LoanDetail::select(['clientid', 'num_of_payment', 'first_payment_date', 'last_payment_date', 'loan_amount'])
            ->cursor()
            ->chunk(200, function ($details) use (&$loanDetails) {
                $loanDetails = $loanDetails->concat($details);
            });

    }

}
