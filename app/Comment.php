<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['article', 'text', 'user_id', 'parent_id'];


    // Get children comments
    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
