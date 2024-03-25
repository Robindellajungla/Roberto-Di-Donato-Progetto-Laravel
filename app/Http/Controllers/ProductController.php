<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function prodotti(){
        return view('prodotti.paginaProdotti');
    }

    public function inviaProdotto(Request $request){
        // dd($request->all());

        // MASS ASSIGNMENT

        $product= Product::create(['name'=>$request->name, 'price'=>$request->price, 'description'=>$request->description]);

        return redirect()->route('homepage')->with('status', 'Prodotto inserito con successo');
    }

    public function indice(){
        $products=Product::all();

        return view('prodotti.indice', compact('products'));
    }
}