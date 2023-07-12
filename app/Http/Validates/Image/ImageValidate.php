<?php
namespace App\Http\Validates\image;

class ImageValidate{

    public static function create($request){
        $request->validate([
            'path' => 'requered',
            
        ]);
    }
    
    public static function update($request){
        $request->validate([
            'id' => 'required|exist:images,id',
            'path' => 'requered',
        ]);
    }

    public static function destroy($request){
        $request->validate([
            'id' => 'required|exist:images,id',
        ]);
    }
}