<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'release_year', 'artist_id', 'album_id'];
    protected $hidden = ['artist_id', 'album_id'];
    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function song(){
        return $this->hasOne(Lyrics::class);
    }
}
