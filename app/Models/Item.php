<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'img_path', 'price', 'quantity'];


    public function category(): BelongsTo
    {

        return $this->belongsTo(Category::class);
    }
}
