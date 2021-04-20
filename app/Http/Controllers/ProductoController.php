<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $categorias = Categoria::all();
            $buscar = trim($request->get('buscar'));
            $categoria = trim($request->get('categoria_id'));
            
            if($buscar and $categoria==0){
                $productos = Producto::where('nombre', 'LIKE', '%'.$buscar.'%')
                        ->orWhere('cod_barras', 'LIKE', '%'.$buscar.'%')
                        ->orderBy('id','asc')
                        ->paginate(2);
                return view("admin.productos.index",compact("productos","categorias","buscar"));

            }else if($buscar and $categoria){
                $productos = Producto::where([['nombre', 'LIKE', '%'.$buscar.'%'], ['categoria_id', 'LIKE', '%'.$categoria.'%']])
                        ->orWhere([['cod_barras', 'LIKE', '%'.$buscar.'%'],['categoria_id', 'LIKE', '%'.$categoria.'%']])
                        ->orderBy('id','asc')
                        ->paginate(2);
                return view("admin.productos.index",compact("productos","categorias","buscar"));
 
            }else if(!$buscar and $categoria){
                $productos = Producto::where('categoria_id', 'LIKE', '%'.$categoria.'%')
                        ->orderBy('id','asc')
                        ->paginate(2);
                return view("admin.productos.index",compact("productos","categorias","buscar"));

            }else if(!$buscar and !$categoria){
                $categorias = Categoria::all();
                $productos = Producto::where('nombre', 'LIKE', '%'.$buscar.'%')
                        ->orWhere('cod_barras', 'LIKE', '%'.$buscar.'%')
                        ->orderBy('id','asc')
                        ->paginate(2);
                return view("admin.productos.index",compact("productos","categorias","buscar"));
            }

            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view("admin.productos.create",compact("categorias", "proveedores"));
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
            'nombre' => 'required|max:250',
            'cod_barras' => 'required|unique:productos',
            'descripcion' => 'required',
            'stock' => 'required|integer',
            'precio_compra' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'precio_venta' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'iva' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'categoria_id' => 'required',
            'proveedor_id' => 'required'
        ]);

        $entrada = $request->all();

        if($archivo = $request->file('imagen_id')){//Si hay imagen
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $imagen = Imagen::create(['url' => $nombre, 'tipo' => 'producto']);

            $entrada['imagen_id'] = $imagen->id;

        }

        Producto::create($entrada);


        return redirect()->route('productos.index');
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
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view("admin.productos.edit", compact("producto","categorias","proveedores"));
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
            'nombre' => 'required|max:250',
            'cod_barras' => 'required|unique:productos,cod_barras,'.$id,
            'descripcion' => 'required',
            'stock' => 'required|integer',
            'precio_compra' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'precio_venta' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'iva' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'categoria_id' => 'required',
            'proveedor_id' => 'required'
        ]);
        
        $producto = Producto::findOrFail($id);

        $entrada = $request->all();

        if($archivo = $request->file('imagen_id')){//Si hay foto
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $imagen = Imagen::create(['url' => $nombre, 'tipo' => 'producto']);

            $entrada['imagen_id'] = $imagen->id;

        }

        $producto->update($entrada);

        
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index'); 
    } 

    public function buscarProducto($codigo){
        $datos = Producto::where('cod_barras', $codigo)->first();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if($datos){ //Si existe el registro
            $res['datos'] = $datos;
            $res['existe'] = true;
        }else{
            $res['error'] = 'No existe ese producto';
            $res['existe'] = false;
        }

        echo json_encode($res);

    }

}
