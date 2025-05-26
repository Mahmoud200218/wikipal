<?php

namespace App\Models\Front;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
