<?php

namespace App\Http\Controllers;

use App\Annonces;
use App\Events\ShowAnnonce;
use App\Http\Requests\AnnoncesRequest;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class AnnoncesController extends Controller
{


    public function __construct()
    {
     //   $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('safe_data', ['except' => ['index', 'store', 'create', 'show']]);
    }


    public function index(Guard $auth)
    {
       // $annonces = $auth->user()->annonces;
        $annonces = Annonces::withoutGlobalScopes()->where('user_id', $auth->user()->id)->get();

        $annonces->load('categories');

        return view('annonces.index', compact('annonces'));
    }

    public function store(AnnoncesRequest $request, Guard $auth)
    {
        $data = $request->all();
        $data['user_id'] = $auth->user()->id;

    //     $data['slug'] = str_slug($data['name'], '-');
        $annonces = Annonces::create($data);
        return redirect(action('AnnoncesController@index'))->with('success', __('messages.saved'));
    }

    public function create()
    {
        $annonces = New Annonces();
        return view('annonces.create', compact('annonces'));
    }

    public function edit($annonces)
    {

        return view('annonces.edit', compact('annonces'));
    }

    public function update(AnnoncesRequest $request, Guard $auth, $annonces)
    {

        $data = $request->all();
        $data['user_id'] = $auth->user()->id;
        $annonces->update($data);
        return redirect(action('AnnoncesController@index'))->with('success', __('messages.update'));
    }

    public function destroy(Annonces $annonce)
    {
      //  $annonces = Annonces::findOrFail($id);
        $annonce->delete();
        return redirect(action('AnnoncesController@index'))->with('success', 'annonce supprimé');
    }

    public function renew($id){
        $annonce = Annonces::withoutGlobalScopes()->findOrFail($id);
        $annonce->update(['updated_at' => Date::now()]);
        return redirect(action('AnnoncesController@index'))->with('success', 'Annonce correctement renouvellée');
    }

    public function getResource($id)
    {
        return Annonces::withoutGlobalScopes()->findOrFail($id);
    }

    public function show($id){
        $annonce = Annonces::where('id',$id)->first();


        if($annonce == null){
            return redirect(route('annonces.index'))->with('danger', 'cette annonce n\'est pas encore validée ou n\'existe simplement pas');
        }else{
            event(new ShowAnnonce($annonce));
            $user = $annonce->user;

            $other = Annonces::where('user_id', $user->id)->limit(4)->where('id', '!=', $annonce->id)->get();
            return view('annonces.show', compact('annonce', 'user', 'other'));
        }
    }

}
