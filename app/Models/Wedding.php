<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'love_stories' => 'array',
        'gallery_photos' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}