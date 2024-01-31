<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CarBooking;    // HasMany
use App\Models\AqarBooking;    // HasMany
use App\Models\Area;    // HasMany
use App\Models\Country;    // belongsTo

class City extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'image',
        'active',
        'country_id',
        'order',

    ];

    protected $hidden=['deleted_at','updated_at'];

    public function getNameAttribute()
    {
        return (app()->getLocale() === 'ar') ? $this->name_ar : $this->name_en;
    }
    // relations

    public function carBooking(){
        return $this->HasMany(CarBooking::class);
    }
    public function categories(){
        return $this->HasMany(Category::class);
    }
    public function categoriesTotal(){
        return $this->belongsToMany(Category::class,'cities-categories','city_id','category_id');
    }
    // relations
    public function aqarBooking(){
        return $this->HasMany(AqarBooking::class);
    }
    // relations
    public function area(){
        return $this->HasMany(Area::class);
    }
    // relations
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
