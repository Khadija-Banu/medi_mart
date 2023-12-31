<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

       // many to one relation in  Post to user
       public function user()
       {
           return $this->belongsTo(User::class);
       }
}
