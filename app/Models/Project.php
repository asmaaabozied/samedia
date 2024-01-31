<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $casts=[

        'name'=>'json',
        'description'=>'json'
    ];

    protected $hidden=['updated_at'];

}
