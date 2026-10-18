<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'instagram_username',
        'notes',
        'quotes',
        'photo_path',
        'music_path',
        'song_title',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}
