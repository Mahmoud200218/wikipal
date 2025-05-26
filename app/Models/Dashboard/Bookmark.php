<?php

namespace App\Models\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = [
        'name',
        'url',
        'description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
