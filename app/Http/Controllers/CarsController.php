<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Services\Car\CarService;
use Illuminate\Http\Request;
use App\Http\Validates\Car\CarValidate;


class CarsController extends Controller
{
    private Cars $model;
    private $validate;
    private CarService $service;


    /**
     * @param Cars $carsModel
     * @param CarValidate $CarValidate
     * @param CarService $carService
     */
    public function __construct(Cars $carsModel, CarValidate $CarValidate, CarService $carService)
    {
        $this->model = $carsModel;
        $this->validate = $CarValidate;
        $this->service = $carService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = $this->service->list();
        return response()->json([
            'status' => true,
            'response' => $cars,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->validate::create($request);

        try {
            $car = $this->service->manage($request->all(), 'create');
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $car,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $cars)
    {

        $this->validate::update($request);

        try {
            $car = $this->service->manage($request->all(), 'update');
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $car,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        try{
            $car = $this->model::destroy($cars);
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }

        return response()->json([
            'response' => $car,
        ], 200);
    }
}