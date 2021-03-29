<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $usuarios = User::paginate(5); 
        return view("admin.usuarios.index",compact("usuarios"));
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view("admin.usuarios.create",compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = $request->all();

        if($archivo = $request->file('imagen_id')){//Si hay imagen
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $imagen = Imagen::create(['url' => $nombre, 'tipo' => 'usuario']);

            $entrada['imagen_id'] = $imagen->id;

        }

        $entrada['password'] = bcrypt($request->password); //Encriptando contraseña
        User::create($entrada);


        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view("admin.usuarios.show",compact("usuario"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view("admin.usuarios.edit", compact("usuario","roles"));
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
        $usuario = User::findOrFail($id);

        $entrada = $request->all();

        if($archivo = $request->file('imagen_id')){//Si hay foto
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images',$nombre);
            $imagen = Imagen::create(['url' => $nombre, 'tipo' => 'usuario']);

            $entrada['imagen_id'] = $imagen->id;

        }

        $usuario->update($entrada);

        
        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }

    public function search(Request $request)
    {
        //$usuario = User::where('usuario', 'LIKE', '%'.$request->search.'%')->get();
        $usuario = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.rol')
            ->where('usuario', 'LIKE', '%'.$request->search.'%')
            ->orWhere('roles.rol', 'LIKE', '%'.$request->search.'%') 
            ->get(); 
        return \response()->json($usuario);
    } 
}
