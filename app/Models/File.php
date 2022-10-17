<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'path', 'byteSize', 'mimeType', 'product_id'];

    public function file(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
