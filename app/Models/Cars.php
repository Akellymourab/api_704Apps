<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\images;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        "brand",
        "model",
        "color",
        "license_plate",
        "nvi",
        "image"
    ];
    
    public function image()
    {
        return $this->belongsTo(images::class, 'image_id','id');
    }
}
