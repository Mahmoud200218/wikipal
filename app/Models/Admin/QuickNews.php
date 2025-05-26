<?php

namespace App\Models\Admin;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class QuickNews extends Model
{
    protected $fillable = [
        'admin_id',
        'title',
        'short_title',
        'status',
        'cover_image',
        'cover_image_description',
        'first_description',
        'second_description',
        'other_image',
        'other_image_description',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
