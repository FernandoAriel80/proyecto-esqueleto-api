<?php

namespace app\Controllers;

use app\Models\Tables\User;
use app\Core\Request;
use app\Core\Response;

class UserController
{

    public function index()
    {
        //$users = User::all();
       //$users = User::where("id", "<", "5")->where("id",">","1")->get();
       $users = User::where("id", "<", "5")->where("id",">","1")->get();

        return Response::json($users);
    }
    
    public function store()
    {
        $request = new Request();
        $data = $request->all();
        
        if (empty(trim($data['nombre'])) || empty(trim($data['apellido']))) {
            return Response::json(['error' => 'Nombre y apellido son requeridos'], 400);
        }
        User::create($data);
        return Response::json(['message' => 'Usuario creado con éxito']);
    }
}
