<?php

namespace App\Http\Controllers\Api;

use App\Events\productCreateEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ApiResponseTrait;


    /**
     * Display a listing of the resource.
     */
    public function __construct(public ProductService $ProductService)
    {

        $this->ProductService = $ProductService;
    }
    public function index(Request $request)
    {
        try {
            $products = Product::with(['category', 'createdBy'])->latest()->paginate($request->limit);
            return $this->success(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
        /*try {

            $limit = min($request->limit ?? 10, 100);

            $products = Product::with(['category', 'createdBy'])
                ->latest()
                ->paginate($limit);

            return $this->success(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }*/
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $this->ProductService->createProduct($request);
            return $this->success();
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return $this->success(new ProductResource($product));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
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
        return $this->success($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk("public")->exists($product->image)) {
            Storage::disk("public")->delete($product->image);
        }

        $product->delete();
        return $this->success();
    }
}
