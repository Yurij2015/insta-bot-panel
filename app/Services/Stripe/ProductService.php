<?php

namespace App\Services\Stripe;

use Stripe\Exception\ApiErrorException;
use Stripe\Product;
use Stripe\StripeClient;

class ProductService
{
    protected string $key;

    public function __construct()
    {
        $this->key = config('services.stripe.stripe_secret');
    }

    /**
     * @throws ApiErrorException
     */
    public function createProduct(array $formData): array
    {
        $stripe = new StripeClient($this->key);

        $stripeProduct = $stripe->products->create([
            'name' => $formData['name'],
            'description' => $formData['description'],
        ]);

        $productPrice = $this->createPrice($formData, $stripeProduct);

        return ['stripeProduct' => $stripeProduct, 'productPrice' => $productPrice];
    }

    /**
     * @throws ApiErrorException
     */
    public function createPrice($formData, Product $stripeProduct): array
    {
        $stripe = new StripeClient($this->key);

        return $stripe->prices->create([
            'currency' => $formData['currency'],
            'unit_amount' => (int)$formData['unit_amount'],
            'recurring' => ['interval' => $formData['interval']],
            'product' => $stripeProduct->id
        ])->toArray();
    }
}
