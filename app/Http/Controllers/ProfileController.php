<?php

namespace App\Http\Controllers;

use Auth;

use Session;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.edit')->with('user', Auth::user());
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
    public function update(Request $request)
    {
        $this->validate($request, [
           'name'   =>  'required',
            'email' =>  'required|email',
        ]);

        $user = Auth::user();


        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $new_featured = time().$avatar->getclientOriginalName();
            $avatar -> move('uploads/avatars', $new_featured);
            $user->profile->avatar = 'uploads/avatars/' . $new_featured;
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->profile->facebook = $request->facebook;

        $user->profile->youtube = $request->youtube;

        $user->profile->about = $request->about;

        $user->save();
        $user->profile->save();



        if ($request->password != "") {
            $user->password = bcrypt($request->password);

            $user->save();
        }


        Session::flash('success', 'Profile updated successfully');

        return redirect()->route('users');
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
