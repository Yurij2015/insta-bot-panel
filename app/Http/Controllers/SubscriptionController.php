<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class SubscriptionController extends Controller
{

    protected string $key;

    public function __construct()
    {
        $this->key = config('services.stripe.stripe_secret');
    }

    public function purchase()
    {
        $products = Product::with(['prices' => function ($q) {
            $q->where('status', true);
        }])->where('status', true)->get();

        return view('subscription.purchase', compact('products'));
    }

    /**
     * @throws ApiErrorException
     */
    public function checkout(Request $request)
    {
        $stripePriceId = $request->query('price');
        $product = Product::whereHas('prices', static function ($q) use ($stripePriceId) {
            $q->where('stripe_price_id', $stripePriceId);
        })->first();

        $price = $product->prices->firstWhere('stripe_price_id', $stripePriceId);

        if (!$request->user()->stripeId()) {
            $request->user()->createAsStripeCustomer();
        }

        $stripe = new StripeClient($this->key);

        $checkoutSession = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'customer' => $request->user()->stripeId(),
            'line_items' => [
                [
                    'price' => $stripePriceId,
                    'quantity' => 1,
                ],
                [
                    'price_data' => [
                        'currency' => $price->currency,
                        'product_data' => [
                            'name' => 'Setup Fee',
                        ],
                        'unit_amount' => $product->setup_fee,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
            'success_url' => route('checkout-success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout-cancel'),
        ]);

        return redirect($checkoutSession->url);
    }
}
