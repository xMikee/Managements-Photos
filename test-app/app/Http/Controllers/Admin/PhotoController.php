<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        $data = [
          "photos" => $photos
        ];

        return view('photos.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required | max:100',
                'url' =>  'required | max:100'
            ]
        );

        $photo = new Photo();
        $photo->title = $request->title;
        $photo->url = $request->url;
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Immagine aggiunta correttamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        $data = [
          "photo" => $photo
        ];
        return view('photos.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $data = [
          "photo" => $photo
        ];

        return view('photos.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $request->validate(
            [
                'title' => 'required | max:100',
                'url' =>  'required | max:100'
            ]
        );

        $photo->title = $request->title;
        $photo->url = $request->url;
        $photo->save();

        return redirect()->route('photos.index')->with('success', 'Immagine aggiornata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Immagine eliminata correttamente');
    }
}
