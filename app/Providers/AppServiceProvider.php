<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayPalPaymentService;
use App\Services\StripePaymentService;
use App\Contracts\PaymentProcessorInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Bind default PaymentProcessorInterface to PayPalPaymentService
        $this->app->bind(PaymentProcessorInterface::class, PayPalPaymentService::class);

        // Contextual binding for PremiumPaymentController to use Stripe
        $this->app->when(\App\Http\Controllers\PremiumPaymentController::class)
                 ->needs(PaymentProcessorInterface::class)
                 ->give(StripePaymentService::class);

        // Tag both PayPal and Stripe services
        $this->app->tag([PayPalPaymentService::class, StripePaymentService::class], 'payment.processors');

        // Bind tagged services as 'PaymentServices'
        $this->app->bind('PaymentServices', function ($app) {
            return $app->tagged('payment.processors');
        });
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
