<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // Ver todas las compras
    public function index()
    {
        $purchases = Purchase::with(['product', 'user'])->get();
        return view('purchases.index', compact('purchases'));
    }

    // Formulario para crear compra
    public function create()
    {
        $products = Product::where('active', true)->get();
        return view('purchases.create', compact('products'));
    }

    // Guardar nueva compra
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'supplier' => 'nullable|string',
            'purchase_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['total'] = $validated['quantity'] * $validated['price'];

        Purchase::create($validated);

        // Aumentar stock del producto
        $product = Product::find($validated['product_id']);
        $product->increment('stock', $validated['quantity']);

        return redirect()->route('purchases.index')
            ->with('success', 'Compra registrada exitosamente');
    }

    // Ver una compra específica
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    // Formulario para editar compra
    public function edit(Purchase $purchase)
    {
        $products = Product::where('active', true)->get();
        return view('purchases.edit', compact('purchase', 'products'));
    }

    // Actualizar compra
    public function update(Request $request, Purchase $purchase)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'supplier' => 'nullable|string',
            'purchase_date' => 'required|date',
        ]);

        $validated['total'] = $validated['quantity'] * $validated['price'];

        $purchase->update($validated);

        return redirect()->route('purchases.index')
            ->with('success', 'Compra actualizada exitosamente');
    }

    // Eliminar compra
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')
            ->with('success', 'Compra eliminada exitosamente');
    }
}
