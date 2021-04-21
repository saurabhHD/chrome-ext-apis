<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage_support extends Model
{
    protected $fillable = ['ext_id','support','faq','privacy','install','uninstall','eula','donate'];
}
