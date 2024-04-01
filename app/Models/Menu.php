<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $casts=[
        'name'=>'json'
    ];

    protected $hidden=['updated_at'];
}
