<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnualPaymentController extends Controller
{
    public function annualPaymentForm($email) {
        dd($email);
    }
}
