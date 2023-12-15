<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;


class ReporteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::query();
    
        if (!empty($_GET['s'])) {
            $clientes = $clientes->where('id', 'LIKE', '%'.$_GET['s'].'%')
                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%');
        }
    
        $porPagina = 50;
        $clientes = $clientes->paginate($porPagina);
    
        return view('reportes-vista.index', compact('clientes'));
    }
}
