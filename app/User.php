<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function receivedMessages()
    {
        return $this->hasMany('App\MessageMeta', 'owner_id');
    }

    public function sentMessages()
    {
        return $this->hasMany('App\Message', 'sender_id');
    }
}
