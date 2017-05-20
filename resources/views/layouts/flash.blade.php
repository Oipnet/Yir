@if(count($errors) >0)
    <div class="container">
        <div class="alert alert-danger">
            <strong>Attention : </strong> il y a quelque probleme
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                         </li>
                     @endforeach
                </ul>
          </div>
    </div>

@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success')  }}
    </div>
    @endif

@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session('danger')  }}
    </div>
@endif
