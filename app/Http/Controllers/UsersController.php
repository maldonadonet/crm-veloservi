<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Datos;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
        if( $request ) {

            $query = trim($request->get('searchText')); 
            $usuarios = DB::table('users')
            ->where('email','LIKE','%'.$query.'%')
            ->Orwhere('tipo_usuario','LIKE','%'.$query.'%')
            ->Orwhere('name','LIKE','%'.$query.'%')
            ->Orwhere('estatus','LIKE','%'.$query.'%')
            ->orderBy('id','desc')
            ->paginate(10);

            return view('usuarios.index',['usuarios'=>$usuarios,'searchText'=>$query]);
        }
    }

    public function show($id) {
        $usuario = DB::table('users as u')
        ->join('datos_cliente as dc','u.id','=','dc.cliente_id')
        ->select('u.email','u.password','u.tipo_usuario','u.rol','u.estatus','u.created_at as fecha_creacion','dc.nombre','dc.telefono','dc.cuidad','dc.colonia','dc.calle')
        ->where('u.id',$id)
        ->first();

        return view('usuarios.show',['usuario'=>$usuario]);
    }

    public function edit($id) {
        $usuario = DB::table('users as u')
        ->join('datos_cliente as dc','u.id','=','dc.cliente_id')
        ->select('u.id','u.email','u.password','u.tipo_usuario','u.rol','u.estatus','u.created_at as fecha_creacion','dc.nombre','dc.telefono','dc.cuidad','dc.colonia','dc.calle')
        ->where('u.id',$id)
        ->first();

        return view('usuarios.edit',['usuario'=>$usuario]);
    }

    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {

        DB::beginTransaction();

        try {

            $usuario = new User;
            $usuario->email = $request->input('email');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->tipo_usuario = $request->input('tipo_usuario');
            $usuario->rol = $request->input('rol');
            $usuario->name = $request->input('nombre');
            $usuario->estatus = $request->input('estatus');
            $usuario->saveOrFail();

            $datos = new Datos;
            $datos->cliente_id = $usuario->id;
            $datos->nombre = $request->input('nombre');
            $datos->telefono = $request->input('telefono');
            $datos->cuidad = $request->input('cuidad');
            $datos->colonia = $request->input('colonia');
            $datos->calle = $request->input('calle');
            $datos->saveOrFail();
            
            DB::commit();
            
        } catch(\Exception $e) {
            DB::rollback();

            return redirect('usuarios')->with('message','Consulta no pudo ser ejecutada, favor de internalo nuevamente');
        }

        return redirect('usuarios')->with('message','Usuario agregado correctamente');
                
    }

    public function update(Request $request, $id) {
        
        DB::beginTransaction();

        try {

            $usuario = User::findOrFail($id);
            $usuario->email = $request->input('email');
            $usuario->password = Hash::make($request->input('password'));
            $usuario->tipo_usuario = $request->input('tipo_usuario');
            $usuario->rol = $request->input('rol');
            $usuario->name = $request->input('nombre');
            $usuario->estatus = $request->input('estatus');
            $usuario->update();

            $datos = Datos::where('cliente_id',$id)->first();
            $datos->nombre = $request->input('nombre');
            $datos->telefono = $request->input('telefono');
            $datos->cuidad = $request->input('cuidad');
            $datos->colonia = $request->input('colonia');
            $datos->calle = $request->input('calle');
            $datos->update();
            
            DB::commit();

            return redirect('usuarios')->with('message','Datos actualizados correctamente');
            
        } catch(\Exception $e) {
            DB::rollback();

            return redirect('usuarios')->with('message','Consulta no pudo ser ejecutada, favor de internalo nuevamente');
        }

        
    }

    public function destroy($id) {
        $usuario = User::findOrFail($id);
        $usuario->estatus = 'inactivo';
        $usuario->update();

        return redirect('usuarios')->with('message','Usuario deshabilitado correctamente');
    }
}
