<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\follows;
use App\Models\User;

class followController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $follower_id = Auth::user()->id;
        $following_id = $id;
        $follows=new follows();
        $follows->follower_id =$follower_id;
        $follows->following_id =$following_id;
        $follows->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user1=User::find(3);
        $user2=User::find(4);
        if($user1->isFollowedBy($user2));
        dd("yes");
        dd("no");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function accept($id)
    {
        follows::where('follower_id', $id)->where('following_id',Auth::user()->id)->update(array('accepted_at' => now()));
        return redirect()->back();
    }
    public function un_follow($id)
    {
        follows::where('follower_id', $id)->where('following_id',Auth::user()->id)->update(array('accepted_at' => null));
        follows::where('follower_id', $id)->where('following_id',Auth::user()->id)->update(array('deleted_at' => now()));
        return redirect()->back();
    }
    public function un_following($id)
    {
        follows::where('following_id', $id)->where('follower_id',Auth::user()->id)->update(array('accepted_at' => null));
        follows::where('following_id', $id)->where('follower_id',Auth::user()->id)->update(array('deleted_at' => now()));
        return redirect()->back();
    }
}

