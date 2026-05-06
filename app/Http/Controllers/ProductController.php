<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = collect(range(1, 20))->map(function (int $id): array {
            return [
                'id' => $id,
                'name' => "Product {$id}",
                'description' => "Random description for product {$id}",
                'price' => random_int(10, 500) * 1000,
            ];
        });

        return view('products.list', compact('products'));
    }

    public function create(): View
    {
        return view('products.form', [
            'product' => null,
            'formAction' => route('products.store'),
            'submitText' => 'Save Product',
        ]);
    }

    public function edit(int $id): View
    {
        $product = [
            'id' => $id,
            'name' => "Product {$id}",
            'description' => "Random description for product {$id}",
            'price' => random_int(10, 500) * 1000,
        ];

        return view('products.form', [
            'product' => $product,
            'formAction' => route('products.update', ['id' => $id]),
            'submitText' => 'Update Product',
        ]);
    }

    public function show(int $id): View
    {
        $product = [
            'id' => $id,
            'name' => "Product {$id}",
            'description' => "Random description for product {$id}",
            'price' => random_int(10, 500) * 1000,
        ];

        return view('products.show', compact('product'));
    }

    public function store(Request $request): RedirectResponse
    {
        return redirect()->route('products')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        return redirect()->route('products.show', ['id' => $id])->with('success', 'Product updated successfully.');
    }
}
