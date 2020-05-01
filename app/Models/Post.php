<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

       //如果当前模型存在则给'slug'字段赋值
        if (! $this->exists) {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
