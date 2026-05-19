<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @return array<int, array<string, int|string>>
     */
    private function allProducts(): array
    {
        $categories = ['Electronics', 'Fashion', 'Home & Living'];
        $adjectives = ['Premium', 'Smart', 'Eco', 'Classic', 'Modern', 'Compact'];
        $items = ['Lamp', 'Headphone', 'Backpack', 'Shoes', 'Bottle', 'Chair'];

        $products = [];

        for ($id = 1; $id <= 30; $id++) {
            $category = $categories[($id - 1) % count($categories)];
            $name = $adjectives[$id % count($adjectives)] . ' ' . $items[$id % count($items)] . " {$id}";
            $description = "{$name} cocok untuk kebutuhan harian dengan kualitas terbaik.";
            $price = 50000 + ($id * 15000);

            $products[] = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'category' => $category,
                'price' => $price,
            ];
        }

        return $products;
    }

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));
        $minPrice = $request->query('min_price');
        $maxPrice = $request->query('max_price');
        $sort = (string) $request->query('sort', 'name_asc');

        $products = collect($this->allProducts())
            ->when($search !== '', function ($query) use ($search) {
                $keyword = mb_strtolower($search);

                return $query->filter(function (array $product) use ($keyword): bool {
                    return str_contains(mb_strtolower($product['name']), $keyword)
                        || str_contains(mb_strtolower($product['description']), $keyword);
                });
            })
            ->when(is_numeric($minPrice), fn ($query) => $query->where('price', '>=', (int) $minPrice))
            ->when(is_numeric($maxPrice), fn ($query) => $query->where('price', '<=', (int) $maxPrice));

        $products = match ($sort) {
            'name_desc' => $products->sortByDesc('name'),
            'price_asc' => $products->sortBy('price'),
            'price_desc' => $products->sortByDesc('price'),
            default => $products->sortBy('name'),
        };

        return view('products.list', [
            'products' => $products->values(),
            'filters' => [
                'search' => $search,
                'min_price' => $minPrice,
                'max_price' => $maxPrice,
                'sort' => $sort,
            ],
        ]);
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
        $product = collect($this->allProducts())->firstWhere('id', $id);

        return view('products.form', [
            'product' => $product,
            'formAction' => route('products.update', ['id' => $id]),
            'submitText' => 'Update Product',
        ]);
    }

    public function show(int $id): View
    {
        $product = collect($this->allProducts())->firstWhere('id', $id);

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
