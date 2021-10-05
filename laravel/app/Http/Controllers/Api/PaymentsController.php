<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Payments\Components\AbstractPayment;
use Illuminate\Http\Response;

class PaymentsController extends Controller
{
    /**
     * Make a payment by any payment system
     * @param AbstractPayment $payment
     * @return Response
     */
    public function store(AbstractPayment $payment): Response
    {
        $payment->createSession();
        // do other things
    }
}
