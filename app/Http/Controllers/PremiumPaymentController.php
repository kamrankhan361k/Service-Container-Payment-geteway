<?php

namespace App\Http\Controllers;
use App\Contracts\PaymentProcessorInterface;

use Illuminate\Http\Request;

class PremiumPaymentController extends Controller
{
    protected $paymentProcessor;

    public function __construct(PaymentProcessorInterface $paymentProcessor)
    {
        $this->paymentProcessor = $paymentProcessor;
    }

    public function processPayment()
    {
        return $this->paymentProcessor->processPayment(200);
    }
}
