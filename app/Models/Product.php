<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table = "migrations";
    protected $fillable = ["title", 'dec', 'price', 'image','category_id'];
    // protected $guarded = ["id",'title'];
    protected $casts = [
        'is_active' => "boolean",
        "settings" => "array"
    ];
    // protected $hidden = [];


    // iphone 15 pro max
    protected static function booted()
    {
        static::creating(function($product){
            // $product->slug = Str::slug($product->title);
            $product->created_by = Auth::user()->id;
        });
        // static::updating(function($product){
        //     if($product->is_locked){
        //         throw new Exception("PRoduct is locked");
        //     }
        // });
    }

    // title
    // IPHONE => iphone - Iphone
    protected function title(){
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtolower($value),
        );
    }
    protected function priceWithTax(){
        return Attribute::make(
            get: fn() => $this->price * 1.14,
        );
    }
    public function scopeActive($q){
        return $q->where("is_active",true);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,OrderItem::class)->withPivot("qty","price");
    }
}