<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with('album', 'artist')->get();
        return response()->json([
            'status'=>true,
            'songs'=>$songs
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request)
    {
        $song = Song::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Song created Successfully !',
            'song'=>$song,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        $song = $song->load('artist:id,name', 'album:id,title');
        return response()->json([
            'status'=>true,
            'song'=>$song
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSongRequest $request, Song $song)
    {
        $song->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Song updated Successfully !',
            'song'=>$song,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Song deleted Successfully !',
        ],200);
    }
}
