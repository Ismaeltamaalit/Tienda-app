<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Ver todas las ventas
    public function index()
    {
        $sales = Sale::with(['product', 'user'])->get();
        return view('sales.index', compact('sales'));
    }

    // Formulario para crear venta
    public function create()
    {
        $products = Product::where('active', true)->get();
        return view('sales.create', compact('products'));
    }

    // Guardar nueva venta
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'sale_date' => 'required|date',
        ]);

        $product = Product::find($validated['product_id']);

        // Verificar stock
        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Stock insuficiente']);
        }

        $validated['user_id'] = auth()->id();
        $validated['total'] = $validated['quantity'] * $validated['price'];
        $validated['status'] = 'completed';

        Sale::create($validated);

        // Reducir stock del producto
        $product->decrement('stock', $validated['quantity']);

        return redirect()->route('sales.index')
            ->with('success', 'Venta registrada exitosamente');
    }

    // Ver una venta específica
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    // Formulario para editar venta
    public function edit(Sale $sale)
    {
        $products = Product::where('active', true)->get();
        return view('sales.edit', compact('sale', 'products'));
    }

    // Actualizar venta
    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'sale_date' => 'required|date',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $validated['total'] = $validated['quantity'] * $validated['price'];

        $sale->update($validated);

        return redirect()->route('sales.index')
            ->with('success', 'Venta actualizada exitosamente');
    }

    // Eliminar venta
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Venta eliminada exitosamente');
    }
}
