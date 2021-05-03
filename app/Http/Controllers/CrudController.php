<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOffersRequest;
use App\Models\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    public function create(){
        return view('offers.create');
    }
    public function store(StoreOffersRequest $request){
       Offers::create([
           'name_en'=>$request->name_en,
           'name_ar'=>$request->name_ar,
           'details_ar'=>$request->details_ar,
           'details_en'=>$request->details_en,
       ]);
        return redirect()->back()->with(['success' => 'bien ajouter']);
    }
    public function showOffers(){
       $offers = Offers::select('id',
           'name_'.LaravelLocalization::getCurrentLocale().' as name',
           'details_'.LaravelLocalization::getCurrentLocale().' as details'
       )->get();
       return view('offers.show',compact('offers'));
    }
    public function editOffers($offer_id){
        $offer=Offers::select('name_ar','name_en','details_en','details_ar')->find($offer_id);
        if(!$offer){
            return redirect()->back();
        }
        else{
            return view('offers.edit',compact('offer'));
        }
    }
    public function updateOffers(StoreOffersRequest $request){

    }

}
