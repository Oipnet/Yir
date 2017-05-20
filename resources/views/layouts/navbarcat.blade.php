<?php $categories = App\Categories::all(); ?>
<nav class="navbar navbar-default" style="margin-left: -27px;">

    <div class="navbar-header">
    </div>
    <div id="navbar" class="navbar-collapse collapse" >
        <ul class="nav navbar-nav">
           @forelse($categories as $cat)
           <li {{ Request::path() == $cat->slug ? 'active' : '' }}><a class="navbar-small" href="/categorie/{{ $cat->slug }}">{{ $cat->name }}</a></li>
               @empty
                <li class="text-white">vous n'avez aucune catégorie</li>
        @endforelse
        </ul>
    </div><!--/.nav-collapse --><!--/.container-fluid -->
</nav>
