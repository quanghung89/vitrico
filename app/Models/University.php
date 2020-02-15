<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    const STATUS_ENABLE = 1 ;
    const STATUS_DISABLE = 0 ;
    protected $table = 'universitys';
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'address',
        'constitutive',
        'admission',
        'tuition',
        'status'
    ];
}
