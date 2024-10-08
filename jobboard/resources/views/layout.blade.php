<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>
<ul><li><a href="{{ route('home') }}">Accueil</a></li></ul>    </header>

    <main>
        @yield('content') <!-- Placeholder pour le contenu spécifique à chaque page -->
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    @vite('resources/js/app.js') <!-- Si tu as aussi un fichier JS à inclure -->
</body>

</html>