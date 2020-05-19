<?php

namespace App\Http\Controllers;

use App\Pedidoesp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Response;
use App\Pedido;
use DB;

class PedidosEspController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if( $request ) {
            $query=trim($request->get('searchText'));

            $pedidos = DB::table('pedido_especial as p')
            ->join('datos_cliente as u','p.usuario_id','=','u.cliente_id')
            ->select('p.id','p.nombre_sucursal as sucursal','p.direccion_sucursal as direccion','p.productos','p.total as monto','p.estatus','p.dir_entrega','u.nombre','u.telefono','u.cuidad','u.colonia','u.calle','u.referencia','u.image','p.repartidor_id','p.created_at as fecha')
            ->where('p.nombre_sucursal','LIKE','%'.$query.'%')
            ->Orwhere('p.created_at','LIKE','%'.$query.'%')
            ->orderBy('p.created_at','desc')
            ->paginate(10);
            
            return view('pedidos.index-especiales',['pedidos'=>$pedidos,'searchText'=>$query]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $pedido = DB::table('pedido_especial as p')
            ->join('datos_cliente as u','p.usuario_id','=','u.cliente_id')
            ->select('p.id','p.nombre_sucursal as sucursal','p.direccion_sucursal as direccion','p.productos','p.total as monto','p.estatus','p.dir_entrega','u.nombre','u.telefono','u.cuidad','u.colonia','u.calle','u.referencia','u.image','p.repartidor_id','p.created_at as fecha')
            ->where('p.id',$id)
            ->first();

        return view('pedidos.show',['pedido'=>$pedido]);
    }

    public function edit(Pedidoesp $pedidoesp)
    {
        //
    }

    public function update(Request $request, Pedidoesp $pedidoesp)
    {
        //
    }

    public function destroy(Pedidoesp $pedidoesp)
    {
        //
    }
}
