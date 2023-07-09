<?php
namespace App\Http\Validates\Driver;

class DriverValidate{

    public static function create($request){
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:drivers',
            'cnh' => 'required|unique:drivers',
            'email' => 'required|unique:drivers',
            'phone' => 'required',
            'address' => 'required',
            'car_id' => 'required',
            'profile_image_id' => 'sometimes',
        ]);
    }
    
    public static function update($request){
        $request->validate([
            'id' => 'required|exist:drivers,id',
            'name' => 'required',
            'cpf' => 'required|unique:drivers',
            'cnh' => 'required|unique:drivers',
            'email' => 'required|unique:drivers',
            'phone' => 'required',
            'address' => 'required',
            'car_id' => 'required',
            'profile_image_id' => 'sometimes',
        ]);
    }

    public static function destroy($request){
        $request->validate([
            'id' => 'required|exist:drivers,id',
        ]);
    }
    

        
    
    
}

   
