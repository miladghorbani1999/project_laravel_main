<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

use Illuminate\Http\Request;
use App\Models\post;
use Illuminate\Support\Facades\Redirect;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {



        $user_auth = Auth::user()->id;
        $validateData = $request -> validate([
            'title'         =>          'required',
            'description'   =>          'required|min:3|max:255',
        ]);


        $ext= $request->file('image')->getClientOriginalExtension();
        $image_name=uniqid() .'.'.$ext;
        $path = $request->file('image')->storeAs(
            'img' ,$image_name
        );
        $post= new post();
        $post->title = $validateData['title'];
        $post->description = $validateData['description'];
        $post->user_id = $user_auth;
        $post->image = $image_name;
        $post->save();
        return redirect()->back();
    }
    public function add(Request $request)
    {

        return view('posts.add');
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

    public function delete(Post $post){
        $post->delete();
        return redirect()->back();
   }
}
