<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $producto = Producto::get();
        return view('productos.index', ['productos' => $producto]);
    }
    public function show(producto $producto)
    {
        return view('productos.show', ['producto' => $producto]);
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->existencias = $request->input('existencias');
        $producto->categoria = $request->input('categoria');
        $producto->proveedor = $request->input('proveedor');
        $producto->save();
        return to_route('home');
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->existencias = $request->input('existencias');
        $producto->categoria = $request->input('categoria');
        $producto->proveedor = $request->input('proveedor');
        $producto->save();
        return to_route('home');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return to_route('home')->with('status', 'post eliminado');
    }
}
