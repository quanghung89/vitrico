<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    const SLIDE_STATUS_ENABLE = 1 ;
    const SLIDE_STATUS_DISABLE = 0 ;
    protected $table = 'slides';
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'image',
        'status',
        'link'
    ];
}
