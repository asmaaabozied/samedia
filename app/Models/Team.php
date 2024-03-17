<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $casts=[

        'name'=>'json',
        'description'=>'json',
        'title'=>'json',
    ];

    protected $hidden=['updated_at'];
}
