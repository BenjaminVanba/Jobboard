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
  
    <ul>
        <li><a href="{{ route('home') }}">Accueil</a></li>
        @if(Auth::check() && Auth::user()->role === 'admin')
            <li><a href="{{ route('backoffice.index') }}">Backoffice</a></li>
        @endif
    
        @if(Auth::check())
            <!-- Bouton de modification du compte, affiché uniquement pour les non-admins -->
            @if(Auth::user()->role !== 'admin')
                <li><a href="{{ route('profile.edit') }}">Modifier mon compte</a></li>
            @endif
    
            <li>Bonjour, {{ Auth::user()->first_name }}!</li>
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="border: none; background: none; cursor: pointer;">Déconnexion</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">Inscription</a></li>
        @endif
    </ul>
    
    </header>
    
    
    
   
    <main>
        @yield('content') <!-- Placeholder pour le contenu spécifique à chaque page -->
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    @vite('resources/js/app.js') 
</body>

</html>