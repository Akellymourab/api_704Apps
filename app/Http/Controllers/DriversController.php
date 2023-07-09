<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;
use App\Http\Validates\Driver\DriverValidate;


class DriversController extends Controller
{

    private Drivers $model;
    private $validate;

    /**
     * Undocumented function
     *
     * @param Drivers $driverModel
     * @param DriverValidate $driverValidate
     */
    public function __construct(Drivers $driverModel, DriverValidate $driverValidate)
    {
        $this->model = $driverModel;
        $this->validate = $driverValidate;
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

        try {
            $driver = $this->model::create($request->all());
        }catch (\Exception $exception)
        {
            return response()->json([
                'response' => $exception->getMessage(),
            ], 400);
        }


        return response()->json([
            'status' => true,
            'response' => $driver,
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
    public function update(Request $request, Drivers $drivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drivers $drivers)
    {
        //
    }
}
