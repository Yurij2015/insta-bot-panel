<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Product;
use App\Services\Stripe\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Exception\ApiErrorException;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    /**
     * @throws ApiErrorException
     * @throws \Exception
     */
    public function store(ProductService $productService, Request $request): void
    {
        try {
            $formData = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'setup_fee' => 'required|integer',
                'status' => 'required|integer',
                'currency' => 'required|string',
                'unit_amount' => 'required|integer',
                'interval' => 'required|string'
            ]);
        } catch (\Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }

        $product = $productService->createProduct($formData);

        $localProduct = Product::create([
            'stripe_product_id' => $product['stripeProduct']['id'],
            'name' => $formData['name'],
            'description' => $formData['description'],
            'setup_fee' => $formData['setup_fee'],
            'status' => $formData['status'],
            'stripe_status' => $product['stripeProduct']['active'],
        ]);

        Price::create([
            'stripe_price_id' => $product['productPrice']['id'],
            'product_id' => $localProduct->id,
            'stripe_product_id' => $product['stripeProduct']['id'],
            'currency' => $formData['currency'],
            'unit_amount' => $formData['unit_amount'],
            'recurring' => ['interval' => $formData['interval']],
            'status' => $formData['status'],
            'stripe_status' => $product['productPrice']['active'],
        ]);

        redirect()->route('products.index');
    }

    public function show(Product $product): View
    {
        $productPrices = Price::with('product')->where('product_id', $product->id)->get();

        return view('products.show', compact('product', 'productPrices'));
    }

    public function edit(): View
    {
        return view('products.edit');
    }

    public function update(): void
    {

    }

    public function destroy(): void
    {

    }
}
