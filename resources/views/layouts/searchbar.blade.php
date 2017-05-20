<div id="MainMenu">
    <div class="list-group panel">
        <a href="#demo3" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu"><i class="fa fa-search"></i></a>
        <div class="collapse" id="demo3">
            <br/>
            {!! Form::open(['method'=>'GET','url'=>'search','class'=>'','role'=>'search'])  !!}
           
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <input type="text" class="form-control" name="search" placeholder="Recherchez..." value="<?php if(isset($keyword)){echo $keyword;} ?>">
                            <br/>
                            {{ Form::select('categories_id', App\Categories::pluck('name', 'id'),null,  ['class' => 'form-control']) }}<br/>
                            </div>
                    </div>


                

                <div class="row">
                        <div class="col-md-4 col-md-offset-5">
                        <input type="submit" class="btn black-background white" value="Lancer la recherche">
                            
                           
                            </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
{!! Form::close() !!}