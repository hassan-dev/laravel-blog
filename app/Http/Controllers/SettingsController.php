<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Session;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.setting')->with('settings', Setting::first());
    }

    public function update()
    {
        $this->validate(request(), [
            'site_name'  => 'required',
            'contact_email' =>  'required',
            'contact_number'  => 'required',
            'address'   =>  'required',
            'sub_address'   =>  'required',
            'working_hours'   =>  'required',
            'about'         =>  'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;

        $settings->contact_email = request()->contact_email;

        $settings->contact_number = request()->contact_number;

        $settings->address = request()->address;

        $settings->sub_address = request()->sub_address;

        $settings->working_hours = request()->working_hours;

        $settings->about = request()->about;

        $settings->save();

        Session::flash('success', 'Settings updated successfully');

        return redirect()->back();
    }
}
