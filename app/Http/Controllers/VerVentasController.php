<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ventas;
use App\Models\Producto;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;

class VerVentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        $folio = trim($request->get('folio'));
        $user = trim($request->get('user_id'));

        if((!$folio and !$user) || ($folio and $user) ){
            $ventas = Ventas::orderBy('id','desc')->paginate(10);

        }else if($folio and $user==0){
            $ventas = Ventas::where('folio', 'LIKE', '%'.$folio.'%')
                    ->orderBy('id','desc')
                    ->paginate(3);
        }else if(!$folio and $user!=0){
            $ventas = Ventas::where('user_id', 'LIKE', '%'.$user.'%')
                    ->orderBy('id','desc')
                    ->paginate(3);
        }
        

        return view("admin.verVentas.index",compact("ventas","users","folio")); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Ventas::find($id);
        $detalle = DetalleVenta::where('venta_id', $id)->get();
        return view("admin.verVentas.show",compact("detalle","venta"));
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
