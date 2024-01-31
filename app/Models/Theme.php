<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory,SoftDeletes;
    public $guarded = ['id'];

    protected $table = 'themes';

    protected $fillable = [
        'name',// required
        'view',// required ,default (0)
        'head',// required
        'header',// nullable
        'footer',// nullable
        'blockt',// nullable
        'tablet',// nullable
        'table1',// nullable
        'table2',// nullable
        'cat',// nullable
        'catplay',// nullable
        'play',// nullable
        'setblock',// required
        'indexn',// required ,default (0)
        'folder',// nullable
    ];
}
