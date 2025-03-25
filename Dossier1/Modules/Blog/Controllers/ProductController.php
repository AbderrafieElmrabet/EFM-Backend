<?php

namespace Modules\Blog\Controllers;

use Modules\Blog\app\Repositories\ProductRepositoryInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\Blog\Models\Product;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\App\requests\ArticleRequest;

class ProductController extends Controller
{
    use AuthorizesRequests;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //
    public function index()
    {
        $blogs = $this->productRepository->getAll();
        return view('Blog::welcome', compact('blogs'));
    }

    public function home()
    {
        $blogs = $this->productRepository->getAll();
        return view('Blog::public', compact('blogs'));
    }

    public function public()
    {
        $products = Product::all();
        return view('Blog::public', compact('products'));
    }

    public function store(ArticleRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'content' => 'required|string',
        //     'stock' => 'required|integer',
        // ]);

        $product = Product::create([
            'title' => $request->title,
            'content' => $request->content,
            'stock' => $request->stock,
            'user_id' => Auth::id()
        ]);

        $product->created_at = $product->created_at->format('Y-m-d H:i:s');

        $product->load('user');
        return response()->json($product);
    }

    public function destroy($id)
    {
        // $this->authorize('delete', $product);

        // $product->delete();
        // return response()->json(['message' => 'Blog deleted successfully']);

        $product = Product::findOrFail($id);

        // Simply delete the product without authorization checks
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
