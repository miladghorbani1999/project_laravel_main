<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\likes;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class likeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $user_id = Auth::user()->id;
        $post_id = $id;
        $like_table=likes::where('user_id',$user_id)->where('post_id',$post_id)->get()->count();
        if($like_table===0){
            $likes= new likes();
            $likes->user_id = $user_id;
            $likes->post_id = $post_id;
            $likes->save();
            return "1";
        }else{
            likes::where('user_id', $user_id)->where('post_id',$post_id)->update(array('deleted_at' => now()));
            return "0";
        }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
