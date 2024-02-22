<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $casts=[
        'value'=>'json',
    ];

    protected $hidden=['updated_at'];

}
