<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Http\Validates\Driver\DriverValidate;
use App\Services\Drivers\DriverService;
use Illuminate\Http\Request;

class DriversController extends Controller
{

    private Drivers $model;
    private DriverValidate $validate;
    private DriverService $service;

    /**
     * Undocumented function
     *
     * @param Drivers $driverModel
     * @param DriverValidate $driverValidate
     * @param DriverService $driverService
     */
    public function __construct(Drivers $driverModel, DriverValidate $driverValidate, DriverService $driverService)
    {
        $this->model = $driverModel;
        $this->validate = $driverValidate;
        $this->service = $driverService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = $this->service->list();
        return response()->json([
            'status' => true,
            'response' => $drivers,
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate::create($request);

        try {
            $drivers = $this->service->manage($request->all(), 'create', $request->only('brand', 'model', 'license_plate', 'nvi'));
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $drivers,
        ], 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drivers $drivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate::update($request);

        try {
            $drivers = $this->service->manage($request->all(), 'update', $request->only('brand', 'model', 'license_plate', 'nvi'));
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $drivers,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drivers $drivers)
    {
        try{
            $drivers = $this->model::destroy($drivers);
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }

        return response()->json([
            'response' => $drivers,
        ], 200);
    }
}
