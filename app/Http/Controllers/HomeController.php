<?php

namespace App\Http\Controllers;

use App\Annonces;
use App\Categories;
use App\Http\Requests\ContactFromAnnonceRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFicheProduit;
use App\Mail\ContactFormulaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function category(){

        $annonce = Annonces::orderByRaw('RAND()')->take(1)->get();
        $user = User::where('pro', '1')->inRandomOrder()->first();
  
       $galerie_pro =  Annonces::where('user_id', $user->id)->first();
  
   
        return view('welcome', compact('annonce', 'galerie_pro', 'user'));
    }

    public function  CategorieParSlug($slug){
     //  $annonces = Categories::where('slug',$slug)->firstorfail()->annoncesValider;
       $cat = Categories::where('slug',$slug)->first();
        $annonces = $cat->annoncesValider;
       $compteur = $annonces->count();

        return view('categories.showparcat', compact('annonces', 'compteur', 'cat'));
    }

    public function vendre(){
        return view('reste.vendre');
    }


    public function cgu(){
        return view('reste.cgu');
    }

    public function ml(){
        return view('reste.ml');
    }
    public function plus(){
        return view('reste.plus');
    }


    public function Recherche(){
        $keyword = Input::get('search', '');
        $cat = Input::get('categories_id', '');
         $pro = Input::get('pro');
       // $pro = Input::get('pro', '3');


        $annonces = Annonces::SearchByKeyword($keyword, $cat,$pro)->get();
        $compteur = $annonces->count();
      return view('recherche.index', compact('annonces', 'keyword', 'compteur', 'cat'));
    }

    public function Contact(){
        return view('contact.index');

    }

   public function PostContact(ContactRequest $request){
  //     dd($request->only('name', 'content', 'email'));
       $informations = $request->all();
       Mail::to('dev@jenaye.fr')->send(new ContactFormulaire($informations));
       return redirect('/')->with('success', 'Votre email a bien été envoyé');
   }


   public function ShowGalerie($name){

       if($name != null){
           $user = User::where('name', $name)->where('pro', true)->where('validate', true)->first();
           $annonces = Annonces::where('user_id', $user->id)->get();
          return view('galerie.index', compact('user', 'annonces'));
       }


   }

   public function PostFicheProduit(ContactFromAnnonceRequest $request, $id){
       $annonce = Annonces::where('id', $id)->first();
       $user = Annonces::where('id',$annonce->id)->firstorfail()->user;
       $informations = $request->all();
       Mail::to($user->email)->send(new ContactFicheProduit($informations, $annonce));
       return redirect('/')->with('success', 'Votre email à bien été envoyé');
   }

}
