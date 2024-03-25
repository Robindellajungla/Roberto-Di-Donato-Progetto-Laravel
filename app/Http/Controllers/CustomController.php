<?php

namespace App\Http\Controllers;

use App\Mail\SendedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home() {

        $persons = [
            ['id'=>1, 'name'=>'Alessio', 'surname'=>'Donigi', 'age'=>64, 'img'=>"/img/daria-shatova-46TvM-BVrRI-unsplash.jpg"],
            ['id'=>2, 'name'=>'Gianluca', 'surname'=>'Feltri', 'age'=>31, 'img'=>"/img/jacalyn-beales-CKsDMYPDgCs-unsplash.jpg"],
            ['id'=>3, 'name'=>'Natale', 'surname'=>'Pasqua', 'age'=>35, 'img'=>"/img/manja-vitolic-gKXKBY-C-Dk-unsplash.jpg"],
            ['id'=>4, 'name'=>'Cicala', 'surname'=>'Arta', 'age'=>29, 'img'=>"/img/nathalie-jolie-nKzeG3iE_Qg-unsplash.jpg"],
            ['id'=>5, 'name'=>'Marco', 'surname'=>'Fina', 'age'=>85, 'img'=>"/img/zeke-tucker-gSSK4u8yPpM-unsplash.jpg"],
        ];

        return view('welcome', ['people'=>$persons]);
    }

    public function chiSiamo() {

        $name = 'Roberto';
        $surname = 'Di Donato';
        $age = 36;

        return view('chiSiamo', ['nome'=>$name, 'cognome'=>$surname, 'anni'=>$age]);
    }

    public function servizi() {

        $paragraph = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magnDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaunt in culpa qui officia deserunt mollit anim id est laborum.";

        $imgP3 = "https://picsum.photos/300";

        return view('servizi', ['paragrafo'=>$paragraph, 'immagineP3'=>$imgP3]);
    }

    public function dettaglio($id) {
        $persons = [
            ['id'=>1, 'name'=>'Alessio', 'surname'=>'Donigi', 'age'=>64, 'img'=>"/img/daria-shatova-46TvM-BVrRI-unsplash.jpg"],
            ['id'=>2, 'name'=>'Gianluca', 'surname'=>'Feltri', 'age'=>31, 'img'=>"/img/jacalyn-beales-CKsDMYPDgCs-unsplash.jpg"],
            ['id'=>3, 'name'=>'Natale', 'surname'=>'Pasqua', 'age'=>35, 'img'=>"/img/manja-vitolic-gKXKBY-C-Dk-unsplash.jpg"],
            ['id'=>4, 'name'=>'Cicala', 'surname'=>'Arta', 'age'=>29, 'img'=>"/img/nathalie-jolie-nKzeG3iE_Qg-unsplash.jpg"],
            ['id'=>5, 'name'=>'Marco', 'surname'=>'Fina', 'age'=>85, 'img'=>"/img/zeke-tucker-gSSK4u8yPpM-unsplash.jpg"],
        ];
        foreach ($persons as $person) {
            if ($id == $person['id']) {

                return view('dettaglio', ['singlePerson'=>$person]);
            }
        }
    }

    public function contattaci(){
        return view('mail.contattaci');
    }
    public function invioMail(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
        $message=$request->input('message');

        // dd($name);

        $dataToSend=compact('name','email','message');

        Mail::to($email)->send(new SendedEmail($dataToSend));

        return redirect()->route('thks',['dataToSend'=>$name])->with('message', 'Mail inviata con successo!');

    }

    public function thanks($dataToSend){
        return view('mail.thanks', compact('dataToSend'));
    }













}