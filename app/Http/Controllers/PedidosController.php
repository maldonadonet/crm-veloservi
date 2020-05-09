<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;
use App\Pedido;
use DB;

class PedidosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request ) {
        
        if( $request ) {
            $query=trim($request->get('searchText'));
            $pedidos = DB::table('pedidos as p')
            ->join('users as u','p.usuario_id','=','u.id')
            ->select('p.id','u.nombre as cliente','p.direccion_entrega as direccion','p.fecha_pedido as fecha','p.monto','p.estatus','p.lt','p.lng','p.created_at','p.updated_at')
            ->where('u.nombre','LIKE','%'.$query.'%')
            ->Orwhere('p.fecha_pedido','LIKE','%'.$query.'%')
            ->orderBy('p.fecha_pedido','desc')
            ->paginate(10);
            
            return view('pedidos.index',['pedidos'=>$pedidos,'searchText'=>$query]);
        }
        
    }

    public function create()
    {
        $cliente = DB::table('users')->where('tipo_usuario','cliente')->get();
        $productos = DB::table('productos')->get();
        $repartidores = DB::table('users')->where('tipo_usuario','Repartidor')->get();

        return view('pedidos.create',['clientes'=>$cliente,'productos'=>$productos,'repartidores'=>$request]);
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        $pedido = DB::table('pedidos_especial as p')
        ->join('users as u','p.usuario_id','=','u.id')
        ->select('p.id','p.nombre_sucursal as sucursal','p.direccion_sucursal as dir_suc','p.productos','p.total as monto','p.estatus','p.dir_entrega as direccion','p.dir_alterna','u.nombre','u.repartidor_id')
        ->where('p.id','=',$id)
        ->first();

        return view('pedidos.show',['pedido'=>$pedido]);
    }

    public function edit($id)
    {
        $pedido = DB::table('pedidos as p')
        ->join('users as u','p.usuario_id','=','u.id')
        ->select('p.id','u.nombre as cliente','p.direccion_entrega as direccion','p.fecha_pedido as fecha','p.monto','p.estatus','p.lt','p.lng','p.id_repartidor as repartidor')
        ->where('p.id','=',$id)
        ->first();

        $detalle = DB::table('detalle_pedido as dp')
        ->join('pedidos as p','dp.pedido_id','=','p.id')
        ->join('productos as pro','dp.producto_id','=','pro.id')
        ->select('dp.id','dp.pedido_id','pro.nombre','dp.cantidad','dp.costo')
        ->where('dp.pedido_id','=',$id)
        ->get();

        return view('pedidos.edit',['pedido'=>$pedido,'detalles'=>$detalle]);
       
    }
    
    public function update(Request $request, Pedido $pedido)
    {
        
    }

    public function destroy(Pedido $pedido)
    {
        //
    }
}
