<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;  //add the namespace

use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Place;    // HasMany
use App\Models\PlaceComment;    // HasMany
use App\Models\Ads;    // HasMany
use App\Models\Car;    // HasMany
use App\Models\CarComment;    // HasMany
use App\Models\Commission;    // HasMany
use App\Models\CarBooking;    // HasMany
use App\Models\AqarBooking;    // HasMany
use App\Models\Aqar;    // HasMany
use App\Models\AqarComment;    // HasMany
use App\Models\BookingNote;    // HasMany
use App\Models\Message;    // HasMany
use App\Models\Notification;    // HasMany
use App\Models\Balance;    // HasMany
use App\Models\Invoice;    // HasMany
use App\Models\Deposit;    // HasMany
use App\Models\AccountType;    // HasMany
use App\Models\Payment;    // HasMany

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'firstname',
        'lastname',
        'code',
        'image',
        'comision',
        'active',
        'latitude',
        'address',
        'longitude',
        'account_type_id',
        'phone',
        'country_code',
        'device_token',
        'token',
        'isguest',
        'type'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token','address',
        'email_verified_at','country_id','city_id','deleted_at','created_at','updated_at','isguest','token','active','image'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];






}
