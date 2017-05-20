{!! Form::model($categories, ['class'=> 'form-horizontal', 'url' => action("CategoriesController@$action", $categories), 'method' => $action == "store" ? "Post": "Put"]) !!}


<div class="form-group">
    <label for="name" class="col-md-4 control-label">Nom de la categorie</label>
    <div class="col-md-6">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-md-4 control-label">url</label>
    <div class="col-md-6">
        {{ Form::text('slug', null, ['class' => 'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            {{__('messages.create') }}
        </button>
    </div>
</div>

{!! Form::close() !!}