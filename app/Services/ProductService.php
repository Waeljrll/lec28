<?php
namespace App\Services;


use App\Events\productCreateEvent;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService{
    public function createProduct($request){
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
        event(new productCreateEvent($product));

        return $product;

    }
}
