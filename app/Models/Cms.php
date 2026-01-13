<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = 'cms';

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'sub_description',
        'image',
        'page_slug',
        'section',
        'is_active',
    ];
}
