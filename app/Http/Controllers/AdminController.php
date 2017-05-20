<?php

namespace App\Http\Controllers;

use App\Annonces;
use App\Mail\BanCompte;
use App\Mail\RefusAnnonce;
use App\Mail\ValidationAnnonce;
use App\Mail\ValidationCompte;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function ListingUsers()
    {
        $users  = User::paginate(env('NB_ENREG_BY_PAGE', 10));
        return view('admin.listingUsers', compact('users'));
    }

    public function PostValidation(Request $request, $id){
        $user = User::findOrFail($id);
        User::where('id', $id)->update(['validate' => '1']);
        Mail::to($user->email)->send(new ValidationCompte($user));
        return redirect()->back()->with('success', 'compte validé' );

    }

    public function Bannir(Request $request, $id){
        $user = User::findOrFail($id);
        User::where('id', $id)->update(['validate' => '-1']);
        /*
         * on recup les annonces pour les mettre en status en attente
         */
        $annonces = Annonces::where('user_id', $id)->get();
        Annonces::where('user_id', $id)->update(['validate' => '0']);
        Mail::to($user->email)->send(new BanCompte($user));
        return redirect()->back()->with('success', 'compte Banni' );
    }
    public function ListingAnnonces(){
        $annonces = Annonces::withoutGlobalScopes()->paginate(env('NB_ENREG_BY_PAGE', 10));
        return view('admin.listingAnnonces', compact('annonces'));
    }

    public function PostValidationAnnonces(Request $request, $id){
        $annonces=  Annonces::withoutGlobalScopes()->where('id', $id)->first();
        $annonces->update(['validate' => '1']);
        $user =  $annonces->user;
        Mail::to($user->email)->send(new ValidationAnnonce($user, $annonces));
        return redirect()->back()->with('success', 'Annonce accepté');
    }

    public function DisableAnnonces(Request $request, $id){
                $annonces=  Annonces::withoutGlobalScopes()->where('id', $id)->first();
                $annonces->update(['validate' => '-1']);
                $user =  $annonces->user;
                Mail::to($user->email)->send(new RefusAnnonce($user, $annonces));

        return redirect()->back()->with('success', 'Annonce refusé');
   
    }
}
