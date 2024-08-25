<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            Log::info('StripeEventListener: invoice.payment_succeeded event received.');
        }
        if ($event->payload['type'] === 'product.updated') {
            Log::info('StripeEventListener: product.updated event received');
        }
    }
}
