<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    const ACCOUNT_STATUS_ENABLE = 1 ;
    const ACCOUNT_STATUS_DISABLE = 0 ;
    protected $table = 'accounts';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'username',
        'email',
        'password',
        'address',
        'phone',
        'image',
        'status',
        'no_cmt'
    ];
}
