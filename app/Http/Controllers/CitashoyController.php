<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;


class CitashoyController extends Controller
{
    public function index()
    {
        $clientes = Cliente::query();
    
        if (!empty($_GET['s'])) {
            $searchTerm = $_GET['s'];
            $clientes->where(function($query) use ($searchTerm) {
                $query->where('id', 'LIKE', "%$searchTerm%")
                    ->orWhere('especialidad', 'LIKE', "%$searchTerm%");
            });
        }
    
        if (!empty($_GET['specialty'])) {
            $clientes->where('especialidad', $_GET['specialty']);
        }
    
        $porPagina = 50;
        $clientes = $clientes->paginate($porPagina);
    
        return view('Reservas-hoy.index', compact('clientes'));
    }
}
