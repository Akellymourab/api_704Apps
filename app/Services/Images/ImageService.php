<?php

namespace App\Services\Image;

use App\Models\images;
use Illuminate\Support\Facades\Storage;

class ImageService {

    private images $model;

    public function __construct(images $images)
    {
        $this->model = $images;
    }
    
    public function create(array $params)
    {
        try{
            if(!empty($params['image']))
            {
                $image = Storage::disk('public')->putFile($params['path'], $params['image']);
                $this->model::create([
                    'path'=>$image
                ]);
            }
        }catch(\Exception $exception){
            return $exception->getMessage();
        }
        return $image;
        

    }
};