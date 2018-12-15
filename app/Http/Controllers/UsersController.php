<?php

namespace App\Http\Controllers;

use Auth;

use App\Post;

use Session;

use Illuminate\Http\Request;

use App\User;

use App\Profile;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
//        $this->middleware('admin', ['except' => ['create', 'store']]);
    }

    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'   =>  'required',
            'email' =>  'required|email'
        ]);

        $user = User::create([
           'name'   =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  bcrypt($request->password)
        ]);

        $profile = Profile::create([
           'user_id'    =>  $user->id,
            'avatar'    =>  'uploads/avatars/1.png'
        ]);

        Session::flash('success', 'User created successfully.');

        return redirect()->route('login');
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
        $user = User::find($id);
        $user->delete();
        $user->profile->delete();

        Session::flash('warning', 'User removed.');

        return redirect()->back();

    }

    public function admin($id)
    {
        $user = User::find($id);


        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Permissions changed successfuly');

        return redirect()->back();
    }

    public function notAdmin($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Permissions changed successfully');

        return redirect()->back();
    }

    public function myPosts()
    {
        return view('admin.posts.myposts')->with('posts', Post::all());
    }

    public function app()
    {
        return view('layouts.app')->with('user', User::all());
    }
}
