<?php

namespace app\Controllers;

use app\Models\Tables\Product;
use app\Core\Response;

class ProductController 
{

    public function index()
    {
        $products = Product::all();
        return Response::json($products);
    }

    /*public function store($data)
    {
        if (!isset($data['nombre']) || !isset($data['apellido'])) {
            Response::json(['error' => 'Nombre y apellido son requeridos'], 400);
        }

        $this->user->create($data['nombre'], $data['apellido']);
        Response::json(['message' => 'Usuario creado con éxito']);
    }*/
}
