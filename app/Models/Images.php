<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{

    protected $guarded = ['id'];
    protected $table = 'project_images';

    public function project(){
        return $this->belongsToMany(Project::class);
    }
}