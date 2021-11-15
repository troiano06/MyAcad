<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function comment() {
        return $this->hasMany('App\Models\Comment');
    }
}
