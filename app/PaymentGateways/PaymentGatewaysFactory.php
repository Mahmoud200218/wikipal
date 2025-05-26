<?php

namespace App\PaymentGateways;

use Exception;
use Illuminate\Support\Str;

class PaymentGatewaysFactory
{

    /**
     * Create a new Payment Gateway instance
     * @param string $gateway
     * @param \App\PaymentGateways\PaymentGateway
     */
    public static function create($name): PaymentGateway
    {
        $class = match ($name) {
            'stripe' => 'App\PaymentGateways\StripePayment',
            'paypal' => 'App\PaymentGateways\PayPal',
            'visa'   => 'App\PaymentGateways\Visa',
            default => 'App\PaymentGateways\\' . Str::studly($name),
        };


        try {
            return new $class();
        } catch (\Exception $e) {
            throw new Exception("Payment Gateway [{$name}] not found");
        }
    }
}
