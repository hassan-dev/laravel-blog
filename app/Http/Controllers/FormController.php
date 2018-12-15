<?php

namespace App\Http\Controllers;

use App\Form;
use Session;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function store(Request $request){
        $data = new Form();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();
        Session::flash('success', 'Data added');
    }
}
