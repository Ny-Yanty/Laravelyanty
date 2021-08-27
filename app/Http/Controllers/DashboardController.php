<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    @return 

    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','show ']]); 
    }

     @return
     
     public fucntion index()
     {
         $user_id = auth()->user()->id;
         $user = User::find($user_id);
         return view('dashboard')->with('posts', $user->posts)
     }
}
