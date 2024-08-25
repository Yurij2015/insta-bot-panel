<?php

namespace App\Providers;

use App\Listeners\StripeEventListener;
use App\Models\Subscription;
use App\Models\SubscriptionItem;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Events\WebhookReceived;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useSubscriptionModel(Subscription::class);
        Cashier::useSubscriptionItemModel(SubscriptionItem::class);

        Event::listen(
            WebhookReceived::class,
            StripeEventListener::class
        );
    }
}
