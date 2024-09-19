<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Container\Container;

class MultiPaymentController extends Controller
{
    protected $paymentServices;

    public function __construct(Container $app)
    {
        // Resolve tagged payment processors from the container
        $this->paymentServices = $app->make('PaymentServices');
    }

    public function listPayments()
    {
        $results = [];

        foreach ($this->paymentServices as $service) {
            $results[] = $service->processPayment(100);
        }

        return $results; // Returns all processors' results
    }
}
