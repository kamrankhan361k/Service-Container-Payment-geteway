<?php

namespace App\Services;

use App\Contracts\PaymentProcessorInterface;

class StripePaymentService implements PaymentProcessorInterface
{
    public function processPayment(float $amount)
    {
        return "Processing a payment of $$amount via Stripe.";
    }
}
