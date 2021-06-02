<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');   
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,POST $posts)
    {
        
        $user_auth=Auth::user()->id;
        $posts=post::where('user_id',$user_auth)->get();
        $user= User::where('id',$user_auth)->get();
        $user=$user[0];
      
        return view('posts.home',compact('posts','user'));
    }
}
