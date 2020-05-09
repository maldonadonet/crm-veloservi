<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Producto;
use App\User;
use DB;

class ProductosController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index(Request $request) {
        
        if( $request ) {

            $query = trim($request->get('searchText'));
            
            $productos = DB::table('productos as p')
            ->join('users as u','p.usuario_id','=','u.id')
            ->select('p.id','p.nombre as producto','p.descripcion','p.categoria','p.precio','p.stock','u.nombre as asociado','p.descuento','p.puntos','p.status','p.foto','p.promocion','p.created_at')
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->Orwhere('u.nombre','LIKE','%'.$query.'%')
            ->Orwhere('p.categoria','LIKE','%'.$query.'%')
            ->orderBy('p.id','desc')
            ->paginate(20);

            return view('productos.index',['productos'=>$productos,'searchText'=>$query]);
        }

    }

    public function create()
    {
        $asociados = User::where('tipo_usuario','Asociado')->get();

        return view('productos.create',['asociados'=>$asociados]);
    }

    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->categoria = $request->input('categoria');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->usuario_id = $request->input('asociado_id');
        $producto->descuento = $request->input('descuento');
        $producto->puntos = $request->input('puntos');
        $producto->status = $request->input('estatus');
        
            $file = $request->file('foto'); 
            $nombre = $producto->nombre.'.jpg';
            \Storage::disk('local')->put( $nombre, \File::get($file) );
            $producto->foto = $nombre;

        $producto->promocion = $request->input('promocion');
        $producto->save();

        return redirect('productos')->with('message','Producto agregado correctamente');
    }

    public function show($id)
    {
        $producto = DB::table('productos as p')
        ->join('users as u','p.usuario_id','=','u.id')
        ->select('p.id','p.nombre','p.descripcion','p.categoria','p.precio','p.stock','u.nombre','p.descuento','p.puntos','p.status','p.foto','p.promocion','p.created_at')
        ->where('p.id',$id)
        ->first();        

        return view('productos.show',['producto'=>$productos]);
    }

    public function edit($id)
    {
        $producto = DB::table('productos as p')
        ->join('users as u','p.usuario_id','=','u.id')
        ->select('p.id','p.nombre as producto','p.descripcion','p.categoria','p.precio','p.stock','u.nombre','u.id as id_asociado','p.descuento','p.puntos','p.status','p.foto','p.promocion','p.created_at')
        ->where('p.id',$id)
        ->first();

        $asociados = User::where('tipo_usuario','asociado')->get();

        return view('productos.edit',['producto'=>$producto,'asociados'=>$asociados]);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->categoria = $request->input('categoria');
        $producto->precio = $request->input('precio');
        $producto->stock = $request->input('stock');
        $producto->usuario_id = $request->input('asociado_id');
        $producto->descuento = $request->input('descuento');
        $producto->puntos = $request->input('puntos');
        $producto->status = $request->input('estatus');
        
            $file = $request->file('foto'); 
            $nombre = $producto->nombre.'.jpg';
            \Storage::disk('local')->put( $nombre, \File::get($file) );
            $producto->foto = $nombre;

        $producto->promocion = $request->input('promocion');
        $producto->update();

        return redirect('productos')->with('message','Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $productos->delete();
    }
}
