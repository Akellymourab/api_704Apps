<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use App\Http\Validates\Car\CarValidate;
use App\Services\Image\ImageService;

class CarsController extends Controller
{
    private Cars $model;
    private $validate;
    private ImageService $imageService;

    /**
     * Undocumented function
     *
     * @param Cars $carsModel
     * @param CarValidate $CarValidate
     * @param ImageService $imageService
     */
    public function __construct(Cars $carsModel, CarValidate $CarValidate, ImageService $imageService)
    {
        $this->model = $carsModel;
        $this->validate = $CarValidate;
        $this->imageService = $imageService;    
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate::create($request);
        dd($request->all());
        try {
            $cars = $this->model::create($request->all());
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $cars,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
