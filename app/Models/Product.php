<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Http\Controllers\BarcodeController;
use App\Models\File;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    // protected $with = ['files']; // always fetch relations, must insert table name
    protected $fillable = ['barcode', 'name', 'description', 'quantity', 'file_id'];
    protected $attributes = [
        'barcode' => '',
        'description' => '',
    ];

    public function files(): HasMany {
        return $this->hasMany(File::class);
    }
}
