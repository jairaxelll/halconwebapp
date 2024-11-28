<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form method="POST" action="{{ route('updateOrder', $order->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="invoice_number">Invoice Number</label>
            <input type="text" name="invoice_number" id="invoice_number" value="{{ $order->invoice_number }}" required>
        </div>

        <div>
            <label for="customer_name">Customer Name</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ $order->customer_name }}" required>
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Ordered" {{ $order->status == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                <option value="In Process" {{ $order->status == 'In Process' ? 'selected' : '' }}>In Process</option>
                <option value="In Route" {{ $order->status == 'In Route' ? 'selected' : '' }}>In Route</option>
                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <button type="submit">Update Order</button>
    </form>

    <a href="{{ route('orders') }}">Back to Orders</a>
</body>
</html>
