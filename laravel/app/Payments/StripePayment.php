<?php

namespace App\Payments;

use App\Payments\Components\AbstractPayment;

class StripePayment extends AbstractPayment
{

    public function createSession()
    {
        // create session
    }
}
