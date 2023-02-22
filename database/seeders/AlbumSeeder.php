<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 4 albums without using factory containing title description and artist_id and user_id
        Album::create([
            'title' => 'Album 1',
            'description' => 'Album 1 description',
            'artist_id' => 1,
        ]);
        Album::create([
            'title' => 'Album 2',
            'description' => 'Album 2 description',
            'artist_id' => 2,
        ]);
        Album::create([
            'title' => 'Album 3',
            'description' => 'Album 3 description',
            'artist_id' => 3,
        ]);
        Album::create([
            'title' => 'Album 4',
            'description' => 'Album 4 description',
            'artist_id' => 4,
        ]);
        Album::create([
            'title' => 'Album 5',
            'description' => 'Album 5 description',
            'artist_id' => 5,
        ]);
        Album::create([
            'title' => 'Album 6',
            'description' => 'Album 6 description',
            'artist_id' => 6,
        ]);
        Album::create([
            'title' => 'Album 7',
            'description' => 'Album 7 description',
            'artist_id' => 7,
        ]);
    }
}
