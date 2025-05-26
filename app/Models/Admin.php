<?php

namespace App\Models;

use App\Models\Admin\QuickNews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'super_admin',
        'suspended',
        'remember_token',
        'email_verified_at'
    ];

   public function quick_news(){
        return $this->hasMany(QuickNews::class, 'admin_id', 'id');
   }

   public function ads(){
        return $this->hasMany(Ads::class, 'admin_id', 'id');
   }
}
