<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'content', 'sender_id'];

    public function receivers()
    {
        return $this->hasMany('App\MessageMeta');
    }

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function getSeenByAttribute()
    {
        return $this->receivers->where('isRead', true);
    }
}
