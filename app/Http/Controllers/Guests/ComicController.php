<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.comics.index',  ['comics' => Comic::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_comic = new Comic();

        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_images', $request->thumb);
            $new_comic->thumb = $file_path;
        }

        $new_comic->title = $request->title;
        $new_comic->description = $request->description;
        $new_comic->price = $request->price;
        $new_comic->series = $request->series;
        $new_comic->sale_date = $request->sale_date;
        $new_comic->type = $request->type;
        $new_comic->artists = $request->artists;
        $new_comic->writers = $request->writers;


        $new_comic->save();

        return view('admin.comics.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
