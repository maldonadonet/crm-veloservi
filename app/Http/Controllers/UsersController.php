<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
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
            ->paginate(8);

            return view('usuarios.index',['usuarios'=>$usuarios,'searchText'=>$query]);
        }
    }

    public function show($id) {
        $usuario = User::where('id',$id)->first();
        return view('usuarios.show',['usuario'=>$usuario]);
    }

    public function edit($id) {
        $usuario = User::where('id',$id)->first();
        return view('usuarios.edit',['usuario'=>$usuario]);
    }

    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {
        $usuario = new User;
        $usuario->email = $request->input('email');
        $usuario->nombre = $request->input('nombre');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->tipo_usuario = $request->input('tipo_usuario');
        $usuario->rol = $request->input('rol');
        $usuario->name = $request->input('nombre');
        $usuario->direccion = $request->input('direccion');
        $usuario->cuidad = $request->input('cuidad');
        $usuario->telefono = $request->input('telefono');
        $usuario->dni = $request->input('dni');
        $usuario->estatus = $request->input('estatus');
        $usuario->perfil_actualizado = 'No';
        $usuario->img_perfil = 'user.png';
        // $file = $request->file('foto'); 
        // $nombre = $usuario->nombre.'.jpg';
        // \Storage::disk('local')->put( $nombre, \File::get($file) );
        // $usuario->img_perfil = $nombre;

        $usuario->save();

        return redirect('usuarios')->with('message','Usuario agregado correctamente');
    }

    public function update(Request $request, $id) {
        
        $usuario = User::findOrFail($id);
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->tipo_usuario = $request->input('tipo_usuario');
        $usuario->rol = $request->input('rol');
        $usuario->nombre = $request->input('nombre');
        $usuario->name = $request->input('nombre');
        $usuario->direccion = $request->input('direccion');
        $usuario->cuidad = $request->input('cuidad');
        $usuario->telefono = $request->input('telefono');
        $usuario->dni = $request->input('dni');
        $usuario->estatus = $request->input('estatus');
        $usuario->perfil_actualizado = 'No';

        $file = $request->file('foto'); 
        $nombre = $usuario->nombre.'.jpg';
        \Storage::disk('local')->put( $nombre, \File::get($file) );
        $usuario->img_perfil = $nombre;

        $usuario->update();

        return redirect('usuarios')->with('message','Usuario actualizado correctamente');
    }

    public function destroy($id) {
        $usuario = User::findOrFail($id);
        $usuario->estatus = 'inactivo';
        $usuario->update();

        return redirect('usuarios')->with('message','Usuario deshabilitado correctamente');
    }
}
