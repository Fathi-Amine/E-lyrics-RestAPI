<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create 10 artists without using factory containing name description and user_id
        Artist::create([
            'name' => 'Artist 1',
        ]);
        Artist::create([
            'name' => 'Artist 2',
        ]);
        Artist::create([
            'name' => 'Artist 3',
        ]);
        Artist::create([
            'name' => 'Artist 4',
        ]);
        Artist::create([
            'name' => 'Artist 5',
        ]);
        Artist::create([
            'name' => 'Artist 6',
        ]);
        Artist::create([
            'name' => 'Artist 7',
        ]);
        Artist::create([
            'name' => 'Artist 8',
        ]);
        Artist::create([
            'name' => 'Artist 9',
        ]);
        Artist::create([
            'name' => 'Artist 10',
        ]);

    }
}
