<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Dashboard\Bookmark;
use App\Models\Dashboard\Business;
use App\Models\Dashboard\Opinion;
use App\Models\Dashboard\Politics;
use App\Models\Dashboard\Sport;
use App\Models\Dashboard\Story;
use App\Models\Dashboard\Style;
use App\Models\Dashboard\Technology;
use App\Models\Dashboard\Travel;
use App\Models\Front\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Usamamuneerchaudhary\Commentify\Traits\HasUserAvatar;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUserAvatar;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country',
        'city',
        'terms',
        'provider',
        'provider_id',
        'provider_token',
        'avatar',
        'trusted',
        'suspended',
        'reports',
        'trust_points'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function politics()
    {
        return $this->hasMany(Politics::class, 'user_id', 'id');
    }
    public function opinions()
    {
        return $this->hasMany(Opinion::class, 'user_id', 'id');
    }

    public function sports()
    {
        return $this->hasMany(Sport::class, 'user_id', 'id');
    }

    public function styles()
    {
        return $this->hasMany(Style::class, 'user_id', 'id');
    }

    public function techs()
    {
        return $this->hasMany(Technology::class, 'user_id', 'id');
    }

    public function business()
    {
        return $this->hasMany(Business::class, 'user_id', 'id');
    }

    public function travel()
    {
        return $this->hasMany(Travel::class, 'user_id', 'id');
    }


    public function stories()
    {
        return $this->hasMany(Story::class, 'user_id', 'id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class, 'user_id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'user_id', 'id');
    }

    public function setProviderTokenAttribute($value)
    {
        $this->attributes['provider_token'] = Crypt::encryptString($value);
    }

    // Accessor / When it is retrieved from the database.
    public function getProviderTokenAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
