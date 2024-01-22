<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name', 'skill_level', 'is_goalkeeper'];

    public $timestamps = false;
}