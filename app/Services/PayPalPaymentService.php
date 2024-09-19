<?php

namespace App\Services;

use App\Contracts\PaymentProcessorInterface;

class PayPalPaymentService implements PaymentProcessorInterface
{
    public function processPayment(float $amount)
    {
        return "Processing a payment of $$amount via PayPal.";
    }
}
