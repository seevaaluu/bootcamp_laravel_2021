<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $libros = Libro::orderBy('id', 'desc')->paginate(10);
        
        return view('libros.index')->with('libros', $libros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'editorial' => 'required',
            'fecha_de_publicacion' => 'required|date'
        ]);

        $libro = new Libro;
        $libro->nombre = $request->nombre;
        $libro->editorial = $request->editorial;
        $libro->fecha_de_publicacion = $request->fecha_de_publicacion;
        $libro->autor_id = 1;
        $libro->save();

        return "El libro se ha registrado correctamente";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
