<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services';

    public $fillable = ['name','description','image'];
    protected $casts = [

        'name' => 'json',
        'description' => 'json'
    ];
//    protected $appends = ['name'];

    protected $hidden = ['updated_at'];

//    public function getNameAttribute()
//    {
//        $lang = Request()->header('accept-language');
//        return (Request()->header('accept-language') === 'ar') ? $this->name[$lang] : $this->name['en'];
//    }


}
