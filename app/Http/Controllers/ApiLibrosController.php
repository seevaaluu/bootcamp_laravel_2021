<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class ApiLibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::orderBy('id', 'desc')->paginate(10);
        return $libros;
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

        return response()->json([
            "status" => "success",
            "message" => "El libro se creo correctamente"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return $libro;
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
        $request->validate([
            'nombre' => 'required',
            'editorial' => 'required',
            'fecha_de_publicacion' => 'required|date'
        ]);

        $libro = Libro::findOrFail($id);
        $libro->nombre = $request->nombre;
        $libro->editorial = $request->editorial;
        $libro->fecha_de_publicacion = $request->fecha_de_publicacion;
        $libro->autor_id = 1;
        $libro->save();

        return response()->json([
            "status" => "success",
            "message" => "El libro se actualizó correctamente"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return response()->json([
            "status" => "success",
            "message" => "El libro se eliminó correctamente"
        ]);
    }
}
