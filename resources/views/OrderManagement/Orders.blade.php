<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- TailwindCSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-2/3 md:w-3/4 lg:w-1/2">
            <h2 class="text-2xl font-semibold mb-4">Orders Management</h2>
            
            <!-- Search and Filter Section -->
            <form method="GET" action="{{ route('orders') }}" class="mb-4 flex items-center">
                <input type="text" name="search" placeholder="Search by Invoice or Customer Name" class="mr-2 px-4 py-2 border border-gray-300 rounded-md">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Search</button>
            </form>

            <!-- Create Order Button -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('createOrder') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Create Order
                </a>
            </div>

            <!-- Orders Table -->
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2">Invoice Number</th>
                        <th class="px-4 py-2">Customer Name</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Delivery Address</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $order->invoice_number }}</td>
                            <td class="px-4 py-2">{{ $order->customer_name }}</td>
                            <td class="px-4 py-2">
                                <span class="font-semibold text-gray-800">{{ $order->status }}</span>
                            </td>
                            <td class="px-4 py-2">{{ $order->delivery_address }}</td>
                            <td class="px-4 py-2">
                                <!-- Action buttons (View, Edit, Delete) -->
                                <a href="{{ route('viewOrder', $order->id) }}" class="text-blue-600 hover:text-blue-800">View</a> |
                                <a href="{{ route('editOrder', $order->id) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a> |
                                <form action="{{ route('deleteOrder', $order->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Pagination (if needed) -->
            <div class="mt-4">
                {{ $orders->links() }}
            </div>

        </div>
    </div>

</body>
</html>
