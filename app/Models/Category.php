<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS_ENABLE = 1 ;
    const STATUS_DISABLE = 0 ;
    protected $table = 'categories';
    protected $fillable = [
        'id',
        'user_id',
        'parent_id',
        'title',
        'slug',
        'name',
        'status'
    ];

    public function news()
    {
        return  $this->hasMany(News::class, 'cate_id');
    }
}
