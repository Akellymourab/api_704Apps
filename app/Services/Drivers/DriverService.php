<?php

namespace App\Services\Drivers;

use App\Models\Drivers;
use App\Services\Cars\CarService;
use App\Services\Images\ImageService;
use PHPUnit\Exception;

class DriverService
{
    private Drivers $model;
    private CarService $carService;
    private ImageService $imageService;

    public function __construct(Drivers $drivers, CarService $carService, ImageService $imageService)
    {
        $this->model = $drivers;
        $this->carService = $carService;
        $this->imageService = $imageService;
    }


    
    public function updateImage(array $params)
    {
        return $this->imageService->create($params);
    }

    public function updateCar(array $params)
    {
        return $this->carService->create($params);
    }

   

    public function manage(array $request, $status = 'create')
    {
        try{

            if($status == 'create')
                $drivers = $this->model::create($request);

            if($status == 'update')
                $drivers = $this->model::where('id','=', $request['id'])->update($request);

            if(!empty($request['image'])){

                $image = self::updateImage([
                    'path' => 'driver-'.$drivers->id,
                    'image' => $request['image']
                ]);

                $drivers->update([
                    'profile_image_id' => $image->id
                ]);
            }
            if(!empty($request['car'])){

                $image = self::updateImage([
                    'path' => 'driver-'.$drivers->id,
                    'car' => $request['car']
                ]);

                $drivers->update([
                    'car_id' => $car->id
                ]);
            }

        }catch (Exception $exception){
            throw new \Exception($exception);
        }

        return $drivers;

    }

    public function list()
    {
        return $this->model::with('profile')->get();
        return $this->model::with('car')->get();
    } 

}
