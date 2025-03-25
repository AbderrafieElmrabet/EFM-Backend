<?php

namespace Modules\Blog\Controllers;

use Modules\Blog\app\Repositories\ProductRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Blog\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\App\requests\ProductRequest;

class ProduitController extends Controller
{
    //
    public function index()
    {
        $products = Produit::latest()->paginate(10);
        return view('Blog::home', compact('products'));
    }

    public function store(ProductRequest $request)
    {
        $product = Produit::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        $product->created_at = $product->created_at->format('Y-m-d H:i:s');

        $product->load('user');
        return response()->json($product);
    }
}
