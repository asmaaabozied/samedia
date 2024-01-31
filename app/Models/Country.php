<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'code',
        'active',
        'image',
        'currency',
        'currency_ar',
        'flag_image',
    ];

    public function cities(){
        return $this->HasMany(City::class);
    }

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
}
