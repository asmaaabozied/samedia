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
        'description'=>'json',
        'client'=> 'json',
        'project_type'=> 'json',
        'duration'=>'json'
    ];

    protected $hidden=['updated_at'];

    public function images()
    {
        return $this->HasMany(Images::class, 'project_id');
    }
}
