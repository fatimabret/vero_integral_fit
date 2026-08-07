<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PagoService;

class PagoController extends Controller
{
    protected $servicio;

    public function __construct(PagoService $servicio)
    {
        $this->servicio = $servicio;
    }

    public function index() { return response()->json($this->servicio->obtenerTodos(), 200); }
    
    public function show(string $id) { return response()->json($this->servicio->obtenerPorId($id), 200); }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'fecha_pago' => 'required|date',
            // Validamos que solo acepte los métodos que definimos en la base de datos
            'metodo_pago' => 'required|string|in:MercadoPago,Transferencia,Efectivo,Tarjeta',
            'comprobante' => 'required|string|max:255',
            'id_usuario' => 'required|integer|exists:usuario,id_usuario'
        ]);
        return response()->json($this->servicio->crear($datosValidados), 201);
    }

    public function update(Request $request, string $id)
    {
        $datosValidados = $request->validate([
            'monto' => 'sometimes|numeric|min:0.01',
            'fecha_pago' => 'sometimes|date',
            'metodo_pago' => 'sometimes|string|in:MercadoPago,Transferencia,Efectivo,Tarjeta',
            'comprobante' => 'sometimes|string|max:255',
            'id_usuario' => 'sometimes|integer|exists:usuario,id_usuario'
        ]);
        return response()->json($this->servicio->actualizar($id, $datosValidados), 200);
    }

    public function destroy(string $id)
    {
        $this->servicio->eliminar($id);
        return response()->json(['mensaje' => 'Pago eliminado'], 200);
    }
}