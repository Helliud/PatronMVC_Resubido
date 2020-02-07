<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Usuario;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $argumentos = array();
        $argumentos['usuarios'] = $usuarios;
        return view('admin.usuarios.index',
            $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->titulo = $request->input('txtTitulo');
        $usuario->cuerpo = $request->input('txtCuerpo');
        if($usuario->save())
        {
            //Si pude guardar la noticia
            return redirect()->route('usuarios.index')->with('exito','La noticia fue guardada correctamente');
        }
        //Aqui no se pudo guardar
        return redirect()->route('usuarios.index')->with('error','La noticia no fue guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);

        if($usuario){

            $argumentos = array();
            $argumentos['usuario'] = $usuario;
            return view('admin.usuarios.show', $argumentos);

        } 
        return redirect()->route('usuarios.index')->with('error', 'No se encontro la noticia');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Usuario::find($id);

        if($noticia){

            $argumentos = array();
            $argumentos['noticia'] = $noticia;
            return view('admin.usuarios.edit', $argumentos);

        } 
        return redirect()->route('usuarios.index')->with('error', 'No se encontro la noticia');
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
        $noticia = Usuario::find($id);
        if($noticia){
            $noticia->titulo = $request->input('txtTitulo');
            $noticia->cuerpo = $request->input('txtCuerpo');

            if($noticia->save()){
                return redirect()->route('noticias.edit', $id)->with('exito', 'La noticia se actualizo exitosamente');

            }
            return redirect()->route('noticias.edit', $id)->with('error', 'No se pudo actualizar la noticia');
        }
        return redirect()->route('noticias.index')->with('error', 'No se encontro la noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if($usuario){
            if($usuario->delete()){
                return redirect()->route('usuarios.index')->with('exito', 'Se pudo eliminar la noticia');
            }
            return redirect()-> route('usuarios.index')->with('error', 'No se pudo eliminar la noticia');
        }
        return redirect()-> route('usuarios.index')->with('error', 'No se encontro la noticia');
    }
}
