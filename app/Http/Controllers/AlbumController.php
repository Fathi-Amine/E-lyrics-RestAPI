<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // $albums = Album::with('artist')->get();
        $albums = Album::join('artists', 'albums.artist_id', '=', 'artists.id')
                ->select('albums.*', 'artists.name as artist_name')
                ->get();
        return response($albums);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request): Response
    {
        $album = Album::create($request->all());
        return response($album);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album): JsonResponse
    {
        $album = $album->load('artist:id,name');

        return response()->json([
            'title' => $album->title,
            'description' => $album->description,
            'artist' => $album->artist->name,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album): Response
    {
        $album->update($request->all());
        return response($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album): Response
    {
        $album->delete();
        return response('',204);
    }
}
