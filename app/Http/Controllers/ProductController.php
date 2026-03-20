<?php

namespace App\Http\Controllers;

use App\Mail\ProductCreatedMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category', 'createdBy'])->latest()->get();
        return view("products.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create_product");
        // if(Gate::allows( 'create_product')){
        $categories = Category::all();
        return view("products.create", ['categories' => $categories]);

        // }
        // abort(4030);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "dec" => "required|string",
            "price" => "required|numeric|min:0",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|mimes:jpg,png|max:2048"
        ]);

        $data = $request->only(['title', 'dec', 'price', 'category_id']);

        if ($request->hasFile('image')) {
            $file = $request->file("image");
            $path = Storage::disk("public")->put("products", $file);
            $data['image'] = $path;
        }

        $product = Product::create($data);

        Mail::send(new ProductCreatedMail(Auth::user(), $product));

        return redirect()->route("products.index")->with("success", "Product Created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("products.edit", ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "title" => "required|string|max:255",
            "dec" => "required|string",
            "price" => "required|numeric|min:0",
            "category_id" => "nullable|exists:categories,id",
            "image" => "nullable|mimes:jpg,png|max:2048"
        ]);

        $data = $request->only(['title', 'dec', 'price', 'category_id']);

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk("public")->exists($product->image)) {
                Storage::disk("public")->delete($product->image);
            }
            $file = $request->file("image");
            $path = Storage::disk("public")->put("products", $file);
            $data['image'] = $path;
        }

        $product->update($data);
        return redirect()->route("products.index")->with("success", "Product Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize("create_product",$product);
        if ($product->image && Storage::disk("public")->exists($product->image)) {
            Storage::disk("public")->delete($product->image);
        }

        $product->delete();
        return redirect()->route("products.index")->with("success", "Product deleted successfully");
    }
}
