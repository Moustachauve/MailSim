<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageMeta extends Model
{
    public function message()
    {
        return $this->belongsTo('App\Message', 'message_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
}
