<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class OpinionTranslation extends Model
{
    public $timestamps = false;

    // Define the fillable attributes for this model.
    protected $fillable = [
        'locale', 'title'
    ];
}
