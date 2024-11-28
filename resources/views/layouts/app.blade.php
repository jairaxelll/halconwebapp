<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halcon WebApp</title>
    <!-- Add your CSS files here, for example Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Your header content, such as logo, navigation, etc. -->
        <nav>
            <!-- Navigation links or menu -->
        </nav>
    </header>

    <main>
        @yield('content')  <!-- This will be replaced by the content of the child views -->
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
