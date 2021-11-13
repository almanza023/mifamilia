<?php

namespace App\Http\Controllers;

use App\Models\Huella;
use App\Models\ProfesionalUnidad;
use App\Models\Unidad;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function busquedas()
    {
        return view('busquedas.index');
    }

    public function focalizacion()
    {
        return view('focalizaciones.index');
    }

    public function consultas()
    {
        return view('consultas.index');
    }

    public function profesionales()
    {
        return view('profesionales.index');
    }

    public function historial()
    {
        return view('historial.index');
    }

    public function seguimiento()
    {
        return view('seguimiento.index');
    }

    public function cambiarRegistro()
    {
        return view('cambiar-registro.index');
    }

    public function estadiscasUnidad()
    {
        return view('estadisticas-unidad.index');
    }




    public function perfil()
    {
        return view('perfil.index');
    }

}
