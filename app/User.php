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

    private function allReceivedMessages()
    {
        return $this->hasMany('App\MessageMeta', 'owner_id');
    }

    public function receivedMessages()
    {
        return $this->allReceivedMessages()->where('deleted', false);
    }

    public function sentMessages()
    {
        return $this->hasMany('App\Message', 'sender_id');
    }

    public function deletedMessages()
    {
        return $this->allReceivedMessages()->where('deleted', true);
    }

    public function getUnreadMessagesAttribute() {
        return $this->receivedMessages->where('isRead', false);
    }


    public function getUnreadDeletedMessagesAttribute()
    {
        return $this->deletedMessages->where('isRead', false);
    }

}
