<?php
namespace App\Http\Validates\User;

class UserValidate{

    public static function create($request){
        $request->validate([
            'name' => 'requered',
            'email' => 'required|unique:users',
            'password' => 'required|unique:users',
        ]);
    }
    
    public static function update($request){
        $request->validate([
            'id' => 'required|exist:users,id',
            'name' => 'requered',
            'email' => 'required|unique:users',
            'password' => 'required|unique:users',
        ]);
    }

    public static function destroy($request){
        $request->validate([
            'id' => 'required|exist:users,id',
        ]);
    }
}