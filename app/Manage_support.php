<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manage_support extends Model
{
    protected $fillable = ['feedback','support','faq','privacy','install','uninstall','eula','donate'];
}
