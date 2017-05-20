@extends('layouts.app')
@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner"  style="height: 300px;">
        <div class="item active">

            <img src="http://lorempicsum.com/futurama/627/200/3" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="http://lorempicsum.com/futurama/627/200/2" alt="Chicago">
        </div>

        <div class="item">
            <img src="http://lorempicsum.com/futurama/627/200/1" alt="New York">
        </div>
    </div>
</div>
<br/><br/><br/><br/>
<!--show annonces -->
<div class="row">
            <div class="col-sm-4 col-sm-push-4">

<a class="thumbnail" style="border:none;" href="{{ route('annonces.show', ['id' => $annonce[0]->id]) }}">
                        <img  style="height: auto; width: 100%" src="{{ url( $annonce[0]->avatar_mini ) }}"/>
                    </a>
            <div class="text-center">   
                <h2> NOUVELLES ANNONCES</h2>
            </div> 

</div></div></br><br/>
<!-- show galerie--> 
<div class="row">
            <div class="col-sm-4 col-sm-push-4">

<a class="thumbnail" style="border:none;" href="{{ route('galerie', ['id' => $user->name]) }}">
                        <img  style="height: auto; width: 100%" src="{{ url( $galerie_pro->avatar_mini ) }}"/>
                    </a>
            <div class="text-center">   
                <h2> NOUVELLES GALERIES</h2>
            </div> 

</div></div>

</div> <!-- fin container -->
<div class="background-black" style="background-color:black; color:white">
    <div class="container text-center"><br/><br/><br/><br/>
        YIR est un site d'annonce, trier par catégorie.<br/>
<br/><br/>
Pour tous les professionnels,particuliers. <br/><br/><br/><br/><br/>
    </div>

</div>

<div class="container text-center"><br/><br/>

    EN SAVOIR <br/><br/>
    <a href="{{ route('plus') }}"><i class="fa fa-plus fa-5x" aria-hidden="true"></i></a>
    <br/><br/>
</div>
    @endsection