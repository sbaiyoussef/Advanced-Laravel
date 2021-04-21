<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    public function create(){
        return view('offers.create');
    }
    public function store(Request $request){

        $rules = [
            'name'=>'required|max:100|unique:offers,name',
            'details'=>'required'
        ];
        $messages = [
            'name.required'=>'veuillez saisir le nom',
            'name.unique'=>'le nome deja existe',
        ];
        $validate=Validator::make($request->all(),$rules,$messages);
        if($validate->fails()){
           return redirect()->back()->withErrors($validate)->withInput($request->all());
        }
       Offers::create([
           'name'=>$request->name,
           'details'=>$request->details
       ]);
        return redirect()->back()->with(['success' => 'bien ajouter']);


    }

}
