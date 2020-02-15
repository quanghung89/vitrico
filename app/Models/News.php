<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const STATUS_ENABLE = 1 ;
    const STATUS_DISABLE = 0 ;
    const URL_IMAGE_NEWS = 'upload/images/new';
    protected $table = 'news';
    protected $fillable = [
        'id',
        'user_id',
        'cate_id',
        'name',
        'title',
        'slug',
        'description',
        'content',
        'image',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    }
}
