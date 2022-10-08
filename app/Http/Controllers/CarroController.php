<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Carro;


class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {


        $carros = Carro::orderBy('id')->paginate(5);

        return [
            'pagination' => [
                'total'         => $carros->total(),
                'current_page'  => $carros->currentPage(),
                'per_page'      => $carros->perPage(),
                'last_page'     => $carros->lastPage(),
                'from'          => $carros->firstItem(),
                'to'            => $carros->lastPage(),
            ],
            'carros' => $carros
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'clase' => 'required',
        ]);

        Carro::create($request->all());

        return;
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
        $this->validate($request, [
            'marca' => 'required',
            'modelo' => 'required',
            'ano' => 'required',
            'clase' => 'required',
        ]);

        Carro::find($id)->update($request->all());

        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = Carro::findOrFail($id);
        $carro->delete();
    }
}
