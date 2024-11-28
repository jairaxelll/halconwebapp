<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
</head>
<body>
    <h1>Order Details</h1>
    <p><strong>Invoice Number:</strong> {{ $order->invoice_number }}</p>
    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    <a href="{{ route('editOrder', $order->id) }}">Edit Order</a>
    <a href="{{ route('orders') }}">Back to Orders</a>
</body>
</html>
