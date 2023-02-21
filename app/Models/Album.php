<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'artist_id'];
    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function song(){
        return $this->hasMany(Song::class);
    }
}
