<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cars;
use App\Models\images;


class Drivers extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "cpf",
        "cnh",
        "email",
        "phone",
        "address",
        "car_id",
        "profile_image_id"
    ];

    /**
     * Undocumented function
     *
     * @return void
     */
    public function car()
    {
        return $this->belongsTo(Cars::class, 'car_id','id');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function profile()
    {
        return $this->belongsTo(images::class, 'profile_image_id','id');
    }

}
