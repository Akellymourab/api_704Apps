<?php

namespace App\Services\Images;

use App\Models\images;
use Illuminate\Support\Facades\Storage;

class ImageService {

    private images $model;

    public function __construct(images $images)
    {
        $this->model = $images;
    }

    /**
     * @param array $params
     * @return false|string
     */
    public function create(array $params)
    {
        try{
            if(!empty($params['image']))
            {
                $imagePath = Storage::disk('public')->putFile($params['path'], $params['image']);
                $image = $this->model::create([
                    'path' => $imagePath
                ]);
            }

        }catch(\Exception $exception){
            return $exception->getMessage();
        }

        return $image;
    }
};