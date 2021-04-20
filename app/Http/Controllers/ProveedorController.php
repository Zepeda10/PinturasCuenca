<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $buscar = trim($request->get('buscar'));
            $proveedores = Proveedor::where('nombre', 'LIKE', '%'.$buscar.'%')
                        ->orWhere('rfc', 'LIKE', '%'.$buscar.'%')
                        ->orderBy('id','asc')
                        ->paginate(2);

            return view("admin.proveedores.index",compact("proveedores","buscar"));
        }
        /*
        $proveedores = Proveedor::paginate(5);
        return view("admin.proveedores.index",compact("proveedores"));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.proveedores.create");
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
            'rfc' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:proveedores',
            'telefono' => 'required|max:10|digits:10'
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->rfc = $request->rfc;
        $proveedor->direccion = $request->direccion;
        $proveedor->email = $request->email;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();

        return redirect()->route('proveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view("admin.proveedores.show",compact("proveedor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view("admin.proveedores.edit", compact("proveedor"));
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
            'rfc' => 'required',
            'direccion' => 'required',
            'email' => 'required|email|unique:proveedores,email,'.$id,
            'telefono' => 'required|max:10|digits:10'
        ]);
        
        $proveedor = Proveedor::findOrFail($id);
        echo $proveedor;
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index');
    }
}
