<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index(){
        $categories = Categories::all();
      return   view('categories.index', compact('categories'));
    }

    public function store(CategoriesRequest $request){
        $categories = Categories::create($request->only('name', 'slug'));
        return redirect(action('CategoriesController@index'))->with('success',  __('messages.saved'));
    }
    public function create(){
        $categories = New Categories();
       return  view('categories.create', compact('categories'));
    }

    public function edit($id){
        $categories = Categories::findOrFail($id);
        return   view('categories.edit', compact('categories'));
    }

    public function update(CategoriesRequest $request, $id){
        $categories = Categories::findOrFail($id);
        $categories->update($request->only('name','slug'));
        return redirect(action('CategoriesController@index'))->with('success',  __('messages.update'));
    }

    public function destroy($id){
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect(action('CategoriesController@index'))->with('success', 'Categorie supprimé');
    }
}
