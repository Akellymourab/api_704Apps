<?php

namespace App\Services\Car;

use App\Models\Cars;
use App\Services\Images\ImageService;
use PHPUnit\Exception;

class CarService
{

    private Cars $model;
    private ImageService $imageService;

   
    public function __construct(Cars $cars, ImageService $imageService)
    {
        $this->model = $cars;
        $this->imageService = $imageService;
    }

    
    public function updateImage(array $params)
    {
        return $this->imageService->create($params);
    }

   

    public function manage(array $request, $status = 'create')
    {
        try{

            if($status == 'create')
                $car = $this->model::create($request);

            if($status == 'update')
                $car = $this->model::where('id','=', $request['id'])->update($request);

            if(!empty($request['image'])){

                $image = self::updateImage([
                    'path' => 'car-'.$car->id,
                    'image' => $request['image']
                ]);

                $car->update([
                    'image_id' => $image->id
                ]);
            }

        }catch (Exception $exception){
            throw new \Exception($exception);
        }

        return $car;

    }

    public function list()
    {
        return $this->model::with('image')->get();
    } 

}
