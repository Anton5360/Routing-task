<?php

namespace App\Providers;

use App\Payments\ApplePayPayment;
use App\Payments\Components\AbstractPayment;
use App\Payments\PayPalPayment;
use App\Payments\StripePayment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AbstractPayment::class, function() {

            $paymentSystem = request('payment_system');

            abort_unless($paymentSystem, '403', 'Payment system is required');

            $preparedPaymentSystemName = Str::preparePaymentSystemName($paymentSystem);

            switch($preparedPaymentSystemName){
                case 'apple':
                    return new ApplePayPayment();
                case 'paypal':
                    return new PayPalPayment();
                case 'stripe':
                    return new StripePayment();
                default:
                    abort('403', 'Requested payment system does not exist');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('preparePaymentSystemName', function($paymentSystem){
            return Str::of($paymentSystem)->trim(' ')->lower();
        });
    }
}
