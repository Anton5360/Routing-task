<?php

namespace App\Payments\Components;

abstract class AbstractPayment
{

    public function __construct(protected string $currency = 'us')
    {}

    abstract public function createSession();
}
