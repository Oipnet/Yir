{!! Form::model($annonces,['class'=> 'form-horizontal', 'files' => true, 'url' => action("AnnoncesController@$action", $annonces), 'method' => $action == "store" ? "Post": "Put"]) !!}


<div class="form-group">
    <label for="name" class="col-md-4 control-label">Titre de l'annonce</label>
    <div class="col-md-6">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Prix de l'annonce</label>
    <div class="col-md-6">
        {{ Form::number('price', null, ['class' => 'form-control']) }}
    </div>
</div>


<div class="form-group">
    <label for="name" class="col-md-4 control-label">Description de l'annonce</label>
    <div class="col-md-6">
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Categorie</label>
    <div class="col-md-6">
        {{ Form::select('categories_id', App\Categories::pluck('name', 'id'),null,  ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">Photo</label>
    @if($annonces->avatar)
        <img src="{{ url($annonces->avatar) }}"/>
    @endif
    <div class="col-md-6">
        {{ Form::file('avatar',['class' => 'form-control']) }}
    </div>
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn black-background white">
            {{__('messages.create') }}
        </button>
    </div>
</div>

{!! Form::close() !!}