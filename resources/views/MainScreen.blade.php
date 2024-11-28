<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Screen</title>
    <!-- You can add Tailwind CSS or Bootstrap here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full sm:w-2/3 md:w-1/2">
            <h2 class="text-2xl font-semibold mb-4">Welcome to the Halcon Web App!</h2>

            <p class="text-sm mb-4">Hello, {{ $email }}. You have successfully logged in!</p>

            <!-- Button to show order details, this could link to another page or display orders -->
            <div class="mb-4">
                <a href="{{ route('orders') }}" class="text-white bg-indigo-600 hover:bg-indigo-700 rounded py-2 px-4 inline-block">
                    View Your Orders
                </a>
            </div>

            <!-- Option to log out -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 rounded py-2 px-4 inline-block">
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>
</html>
