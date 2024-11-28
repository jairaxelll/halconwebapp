<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show a list of orders
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orders = Order::when($search, function ($query, $search) {
            return $query->where('invoice_number', 'like', "%{$search}%")
                         ->orWhere('customer_name', 'like', "%{$search}%");
        })
        ->paginate(10); // Paginate results
        
        return view('OrderManagement.Orders', compact('orders'));
    }

    // View a specific order
    public function view($id)
    {
        $order = Order::findOrFail($id);
        return view('OrderManagement.ViewOrder', compact('order'));
    }

    // Edit an order
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('OrderManagement.EditOrder', compact('order'));
    }

    // Update an order
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        // Validate and update order
        $validated = $request->validate([
            'invoice_number' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'status' => 'required|string', // Add any other necessary validation rules
        ]);

        $order->update($validated);

        return redirect()->route('orders')->with('success', 'Order updated successfully');
    }

    // Show the order creation form
    public function create()
    {
        return view('OrderManagement.createOrder');
    }

    // Store a new order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required|unique:orders',
            'customer_name' => 'required|string|max:255',
            'customer_number' => 'required|string|max:255',
            'delivery_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);
    
        // Assign a default value for status if it's not provided in the form
        $validated['status'] = 'Ordered'; // Ensure this is one of the allowed ENUM values
    
        // After validation passes, store the order
        Order::create($validated);
    
        return redirect()->route('orders')->with('success', 'Order created successfully.');
    }
    
    // Soft delete an order (mark as deleted)
    public function delete($id)
    {
        $order = Order::findOrFail($id);

        // Soft delete the order instead of hard deleting it
        $order->delete();

        return redirect()->route('orders')->with('success', 'Order deleted successfully');
    }
}
