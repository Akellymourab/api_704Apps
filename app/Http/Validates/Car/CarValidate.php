<?php
namespace App\Http\Validates\Car;

class CarValidate{

    public static function create($request){
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license_plate' => 'required|unique:cars',
            'nvi' => 'required|unique:cars',
            'image_id' => 'sometimes',
        ]);
    }

    public static function update($request){
        $request->validate([
            'id' => 'required|exist:cars,id',
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'license_plate' => 'required|unique:cars',
            'nvi' => 'required|unique:cars',
            'image_id' => 'sometimes',
        ]);
    }

    public static function destroy($request){
        $request->validate([
            'id' => 'required|exist:cars,id',
            
        ]);
    }
}

