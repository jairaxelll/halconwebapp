<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <!-- Add your CSS files here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="max-w-2xl mx-auto p-6 bg-white border border-gray-300 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create New Order</h2>

        <form method="POST" action="{{ route('storeOrder') }}">
            @csrf
            <div class="mb-4">
                <label for="invoice_number" class="block text-sm font-medium text-gray-700">Invoice Number</label>
                <input type="text" id="invoice_number" name="invoice_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium text-gray-700">Customer Name</label>
                <input type="text" id="customer_name" name="customer_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="customer_number" class="block text-sm font-medium text-gray-700">Customer Number</label>
                <input type="text" id="customer_number" name="customer_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div class="mb-4">
                <label for="delivery_address" class="block text-sm font-medium text-gray-700">Delivery Address</label>
                <textarea id="delivery_address" name="delivery_address" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <div class="mb-4">
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea id="notes" name="notes" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
            <label for="fiscal_data" class="block text-sm font-medium text-gray-700">Fiscal Data</label>
            <textarea id="fiscal_data" name="fiscal_data" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required></textarea>
        </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">
                    Create Order
                </button>
            </div>
        </form>
    </div>
</body>
</html>
