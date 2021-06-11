<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplerCompany extends Model
{
    protected $fillable = [
        'name', 'description','rating'
    ];
}
