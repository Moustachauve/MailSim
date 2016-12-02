<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageMeta extends Model
{
    public function message()
    {
        return $this->belongsTo('App\Message');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
