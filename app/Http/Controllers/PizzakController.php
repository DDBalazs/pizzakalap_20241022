<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizzak;

class PizzakController extends Controller
{
    public function akcios(){
        return view('welcome', [
            'result' => pizzak::where('akcios',1)        //SELECT * FROM pizzak WHERE akcios = 1
                                ->get()
        ]);
    }

    public function adatlap($id){
        return view('adatlap', [
            'result' => pizzak::find($id)               //SELECT * FROM pizzak WHERE id = $id
        ]);
    }

    public function rnd(){
        /*$hossz = pizzak::count('id');
        $rnd = rand(1,$hossz); */
        $rnd = pizzak::inRandomOrder()->first();
        return view('adatlap', [
            'result' => pizzak::find($rnd->id)
        ]);
    }
    public function osszes(){
        return view('osszes', [
            'result' => pizzak::all()
        ]);
    }
    public function osszes2($p){
        switch($p){
            case 1:
                $sv = pizzak::orderBy('nev')->get();
            break;
            case 2:
                $sv = pizzak::orderByDesc('nev')-> get();
                break;
                case 3:
                $sv = pizzak::orderBy('ar')->get();
                break;
                case 4;
                $sv = pizzak::orderByDesc('ar') -> get();
            break;
        }

        return view('osszes',[
            'result' => $sv
        ]);
    }
}
