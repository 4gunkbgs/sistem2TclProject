<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {                   
        if(Auth::check()){                                             
            //pakek nangkep api gunakan httpguzzle
            $response = Http::get('http://localhost:8000/api/todo');       
            $jsonDatas = $response->json();                                          

            $collections = $jsonDatas['data'];                            
            
            $email = Auth::user()->email;
            $user = Auth::user();            
            $dataTodoUser = array();

            foreach($collections as $data){            
                //cek jika email sama
                if(!strcmp($email, $data['user']['email'])){
                    $dataTodoUser[] = $data;
                }
            }                                     
            
            return view('welcome', [
                                    'dataTodoUser' => $dataTodoUser , 
                                    'user' => $user
                                    ]);
        }
             
        return redirect("/")->withSuccess('You are not allowed to access');  
    }
}
