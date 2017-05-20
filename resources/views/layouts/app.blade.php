<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{!!  csrf_token() !!}">

    <title>{{ config('app.name', 'Yir') }}</title>

    <!-- Styles -->
     <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

<br/><br/>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b>{{ config('app.name', 'YES I REMEMBER') }}</b>
                    </a>
                    <p class="navbar-text navbar-small">Laravel App</p>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="navbar-small" ><a href="{{ route('vendre') }}" style="color: #AB8F03 !important;">VENDRE</a></li>
                            <li class="navbar-small"><a href="{{ route('login') }}">CONNEXION</a></li>
                            <li class="navbar-small"><a  data-toggle="modal" data-target="#myModal">INSCRIPTION</a></li>


                        @else
                            <li class="dropdown">
                            {{--    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{Auth::user()->email }} <span class="caret"></span>
                                </a>--}}


                                    <li class="navbar-small" ><a href="{{ url('/annonces/create') }}" style="color: #AB8F03 !important;">VENDRE</a></li>
                                    <li class="navbar-small" ><a href="{{ url('/annonces') }}">MES ANNONCES</a></li>
                                    <li class="navbar-small" ><a href="{{ route('profil') }}">MON PROFIL</a></li>
                                  {{--      <li><a href="{{ url('contact') }}">Formulaire de contact</a></li>--}}
                                    <li >
                                        <a class="navbar-small" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            DECONNEXION
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                            </li>
                        @endif
                        @if(Auth::user() &&  Auth::user()->role == 'admin')
                        <div class="dropdown pull-right">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Administration
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('admin/categories') }}">Gestion des Categories</a></li>
                                <li><a href="{{ url('admin/listing/users') }}">Gestion des utilisateurs</a></li>
                                <li><a href="{{ url('admin/listing/annonces') }}">Gestion des  annonces</a></li>
                            </ul>
                        </div>
                        @endif

                        <?php $categories = App\Categories::all(); ?>
                        <hr>
                            @forelse($categories as $cat)

                                <li {{ Request::path() == $cat->slug ? 'active' : '' }}><a class="navbar-small hidden-md hidden-lg hidden-sm" href="/categorie/{{ $cat->slug }}">{{ $cat->name }}</a></li>
                            @empty
                                <li class="text-white">vous n'avez aucune catégorie</li>
                            @endforelse

                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include('layouts.navbarcat')

        @include('layouts.searchbar')
            <br/>
            </div>
    <div class="container">
        @include('layouts.flash')

        @yield('content')
    </div>
        <div class="footer navbar">
            <footer class="footer">
                <hr>
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 "><b style="font-size: 25px; font-family: 'Pinyon Script', cursive;">Informations</b><br/><br/>
                            <a href="{{ route('cgu') }}" class="text-muted thin">CONDITIONS GÉNÉRALES</a><br/><br/>
                            <a href="{{ route('ml') }}" class="text-muted">MENTIONS LEGALES</a><br/><br/>
                            <a href="{{ url('contact') }}" class="text-muted">CONTACTEZ-NOUS</a><br/><br/>
                            <a href="" class="text-muted">NOUS</a>
                        </div>
                        <div class="col-md-4"><b style="font-size: 25px; font-family: 'Pinyon Script', cursive;">Services</b><br/><br/>
                            <a href="{{ url('/annonces/create') }}" class="text-muted">VENDRE SUR YIR</a><br/><br/>
                        </div>
                        <div class="col-md-4 text-center"><b style="font-size: 25px; font-family: 'Pinyon Script', cursive;">Suivez nous</b></div>
                        </div>

                </div>
            </footer>

    </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Type de compte</h4>
                    </div>
                    <div class="modal- text-center"><br/>
                        <a href="{{ url('register') }}"><i class="fa fa-user" aria-hidden="true"></i><br/>Compte particulier</a><br/><br/>
                        <a href="{{ route('register-pro') }}"><i class="fa fa-industry" aria-hidden="true"></i><br/>Compte professionel</a><br/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/laravel.js') }}"></script>
</body>

</html>
