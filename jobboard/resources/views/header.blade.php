<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2" style="right:100px;">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="logo.png" alt="logo" style="float: left; width: 150px; height: auto margin:10px; margin-top:10px;">
                            </a>
                         </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Accueil</a></li>

                                        @if(!Auth::check() || Auth::user()->role !== 'admin')
                                            <li><a href="{{ route('jobboard') }}">Trouver un emploi</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                        @endif

                                        @if(Auth::check() && Auth::user()->role === 'admin')
                                            <li><a href="{{ route('backoffice.index') }}">Backoffice</a></li>
                                        @endif

                                        @if(Auth::check())
                                        <li class="has-submenu">
                                            <a href="#" class="user-name" style="left:70px; margin-left:300px;">
                                                 {{ Auth::user()->first_name }}
                                            </a>
                                            <ul class="submenu" style="left:70px; margin-left:300px;">
                                                <!-- Afficher "Modifier mon compte" uniquement si l'utilisateur n'est pas admin -->
                                                @if(Auth::user()->role !== 'admin')
                                                    <li><a href="{{ route('profile.edit') }}">Modifier mon compte</a></li>
                                                @endif
                                                <li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn-logout">Déconnexion</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}">Connexion</a></li>
                                        <li><a href="{{ route('register') }}">Inscription</a></li>
                                    @endif
                                    
                                    
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<style> 
    .btn-logout {
        border: none;                  /* Pas de bordure */
        background: transparent;      /* Fond transparent */
        color: #0b0202;               /* Couleur du texte */
        cursor: pointer;              /* Curseur pointeur */
        padding: 10px 15px;          /* Espacement interne */
        font-size: 16px;              /* Taille de police */
        text-decoration: none;        /* Pas de soulignement */
    }

    .btn-logout:hover {
        color: #f39c12;               /* Couleur du texte au survol */
        transition: color 0.3s;       /* Transition douce */
    }

    .user-name {
        /* Style optionnel pour le nom de l'utilisateur */
    }
</style>
