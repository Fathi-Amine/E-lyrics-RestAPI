<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response



     */



    public function index()
    {

        $artists=Artist::all();
        return response()->json($this->ArtistData($artists));
    }

    public function ArtistData($artists){
        $data = [];

        foreach($artists as $artist){

            $data[]=$artist->name;
           


        }
        return $data;

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'name'=>'required'
        ]);

        $artist = Artist::create([
            'name'=>$request->name


        ]);
        return response()->json($artist);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artistmodel  $artistmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {

        $data=$artist->Name;
        return response()->json($data);





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artistmodel  $artistmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artistmodel  $artistmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $this ->validate($request,[
            'name'=>'required'
        ]);

        $artist->update([
            'name'=>$request->name


        ]);
        return response()->json($artist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artistmodel  $artistmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return response()->json(
            [
                'message'=>'artist deleted succefully'
            ]
        );
    }
}
