<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombres'   => 'required', 'string', 'max:255',
            'email'     => 'required', 'email', 'min:8',
            'telefono'  => 'required',
            'calle'     => 'required',
            'num_calle' => 'required',
            'colonia'   => 'required',
            'ciudad'    => 'required',
            'municipio' => 'required',
            'estado'    => 'required',
            'c_postal'  => 'required'
        ],[
            'nombres.required'  => 'Escribe tu Nombre Completo con Apellidos',
            'email.required'    => 'Escribe tu Correo Electrónico',
            'email.email'       => 'La dirección de Correo Electronico no es valido',
            'telefono.required' => 'Igresa tu numero Telefónico',
            'calle.required'    => 'Igresa el nombre de la Calle',
            'num_calle.required'=> 'Igresa el numero de la Calle',
            'colonia.required'  => 'Igresa el nombre de la Colonia',
            'ciudad.required'   => 'Igresa el nombre de la Ciudad',
            'municipio.required'=> 'Igresa el municipio',
            'estado.required'   => 'Igresa el estado',
            'c_postal.required' => 'Igresa el codigo postal de la ciudad'
        ]);

        return view('clientes.mapa', [
            'nombres'   => request('nombres'),
            'email'     => request('email'),
            'telefono'  => request('telefono'),
            'calle'     => request('calle'),
            'num_calle' => request('num_calle'),
            'colonia'   => request('colonia'),
            'ciudad'    => request('ciudad'),
            'municipio' => request('municipio'),
            'estado'    => request('estado'),
            'c_postal'  => request('c_postal'),
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
