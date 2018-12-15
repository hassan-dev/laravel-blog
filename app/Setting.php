<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_name', 'contact_number', 'contact_email', 'address', 'sub_address', 'about', 'working_hours'];
}
