<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresas::orderBy('nombre')->get();

        return view('empresas.index', ['empresas' => $empresas]);
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
        $this->validate(
            $request,
            [
                'nombre' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'direccion' => 'required',
            ],
            [
                'nombre.required' => 'Ingresa el nombre de la empresa',
                'email.required' => 'Ingresa un correo electrónico',
                'telefono.required' => 'Ingresa un numero telefónico',
                'direcion.required' => 'Ingresa la dirección de la empresa',
            ],
        );

        $direccion = $request->input('direccion');

        $find = urlencode(trim($direccion));
        $google_maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $find . '&key=YOUR_APIKEY';
        $google_maps_json = file_get_contents($google_maps_url);
        $google_maps_array = json_decode($google_maps_json, true);
        $latitude = $google_maps_array['results'][0]['geometry']['location']['lat'];
        $longitude = $google_maps_array['results'][0]['geometry']['location']['lng'];

        $empresas = new Empresas();
        $empresas->nombre = $request->input('nombre');
        $empresas->email = $request->input('email');
        $empresas->telefono = $request->input('telefono');
        $empresas->direccion = $direccion;
        $empresas->latitud = $latitude;
        $empresas->longitud = $longitude;
        $empresas->save();

        return redirect()
            ->back()
            ->withSuccess('Se ha registrado la empresa con ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('empresas.mapa', [
            'empresa' => Empresas::findOrFail($id),
        ]);
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
