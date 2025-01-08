<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'tbl_posts';
    protected $fillable = [
        'title', 'slug', 'user_id', 'content', 'image', 'hits', 'aktif', 'status'
    ];
}
