<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Vendor;
use App\Models\Company;

class Medicine extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
