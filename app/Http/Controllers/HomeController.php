<?php

namespace App\Http\Controllers;
use App\Models\likes;
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
        $users = User::where('id', '!=', Auth::id())->get();
        $posts=post::all();
        $user_followers=Auth::user()->following()->get();
        $notFollows=array();
        $followers=array();
        $request_follow=array();
        // foreach($users as $user){
        //     if(Auth::user()->followers()->where('accepted_at',null)->get()->count()==0)
        //         array_push($notFollows,$user);
        // };
        foreach($users as $user){
            if(!Auth::user()->isFollowedBy($user))
                array_push($notFollows,$user);

        };
        foreach(Auth::user()->following()->get() as $user_follower){
            if($user_follower->accepted_at == null ){
                foreach($users as $user){
                   if($user_follower->follower_id == $user->id)
                       array_push($request_follow,$user);
                   };
               }
               else{
                   foreach($users as $user){
                       if($user_follower->follower_id == $user->id)
                           array_push($followers,$user);
                       };
               };

        };
        return view('posts.home',compact('posts','users','notFollows','request_follow','followers'));
    }
    public function show($id)
    {
        $posts=post::where('user_id',$id)->get();
        return view('posts.my_posts',compact('posts'));
    }
    public function show_user()
    {
        $count_followers=Auth::user()->following()->where('accepted_at','!=',null)->get()->count();
        $counter_following=Auth::user()->followers()->where('accepted_at','!=',null)->get()->count();
        $count_like=likes::where('user_id',Auth::user()->id)->count();
        return view('users.profile',compact('count_followers','counter_following','count_like'));
    }
}

