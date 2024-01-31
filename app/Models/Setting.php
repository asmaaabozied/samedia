<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'settings';


    protected $fillable = [

        'terms_conditions',
        'website_address',
        'email',
        'website_link',
        'logo',
        'closing_message',
        'description',
        'key_words',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'time_difference',
        'snapchat',
        'play_store',
        'google_play',
        'availability_time_from',
        'availability_time_to',
        'phone_one',
        'phone_two',
        'ios_version',
        'android_version',
        'activate'

    ];

    protected $hidden=['deleted_at','updated_at','created_at'];
}
