<?php

namespace App\Controllers;

use App\Models\Tables\User;
use App\Core\Request;
use App\Core\Response;

class UserController
{

    public function index()
    {
        $users = User::all();
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
