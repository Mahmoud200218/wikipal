<?php

namespace App\Models\Dashboard;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;

class Opinion extends Model
{
    use HasFactory, Commentable;
    protected $fillable = [
        'user_id',
        'title',
        'short_title',
        'status',
        'cover_image',
        'cover_image_description',
        'have_source',
        'source_url_one',
        'source_url_two',
        'source_url_three',
        'first_description',
        'second_description',
        'other_image',
        'other_image_description',
        'policies',
        'podcast'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
