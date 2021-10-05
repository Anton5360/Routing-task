<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Payments\Components\AbstractPayment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentsController extends Controller
{
    /**
     * Make a payment by Apple Pay
     * @return Response
     */
    public function store(): Response
    {

    }
}
