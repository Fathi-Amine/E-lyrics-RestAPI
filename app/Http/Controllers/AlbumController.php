<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    // // Check if the request has form data and handle it appropriately
    // if ($request->headers->get('Content-Type') === 'multipart/form-data') {
    //     // Get the form data from the request
    //     $formData = $request->all();
    //     // Update the album with the form data
    //     $album->update($formData);
    // } else {
    //     // If the request doesn't have form data, update the album with the request data
    //     $album->update($request->all());
    // }

    // // Return a response with the updated album
    // return response($album);

        // Log::info($request->all()); // add this line to log the form data

        // $album->update($request->all());

        // return response($album);
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'artist_id' => 'required|integer',
        // ]);
    
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }
    
        // $album->update($request->all());
    
        // return response($album);

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
