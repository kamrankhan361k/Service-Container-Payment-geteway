<?php

namespace App\Contracts;

interface PaymentProcessorInterface
{
    public function processPayment(float $amount);
}
