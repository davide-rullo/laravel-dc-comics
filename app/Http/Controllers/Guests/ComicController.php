<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('admin.comics.index',  ['comics' => Comic::all()]);
        return view('admin.comics.index',  ['comics' => Comic::withTrashed()->get()]);
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
    public function store(StoreComicRequest $request)
    {

        /* validazione all'interno del controller
       $valid_data = $request->validate([
            'title' => 'required|min:3',

        ]); */


        //cambio con il mass assignment

        // $new_comic = new Comic();

        $valid_data = $request->all();
        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_images', $request->thumb);
            $valid_data['thumb'] = $file_path;
        }

        // $new_comic->title = $request->title;
        // $new_comic->description = $request->description;
        // $new_comic->price = $request->price;
        // $new_comic->series = $request->series;
        // $new_comic->sale_date = $request->sale_date;
        // $new_comic->type = $request->type;
        // $new_comic->artists = $request->artists;
        // $new_comic->writers = $request->writers;


        // $new_comic->save();

        // return view('admin.comics.create');

        $comic = Comic::create($valid_data);
        return to_route('comics.show', $comic);
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
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $valid_data = $request->validated();

        if ($request->has('thumb') && $comic->thumb) {


            Storage::delete($comic->thumb);

            $newImageFile = $request->thumb;
            $path = Storage::put('comics_images', $newImageFile);
            $valid_data['thumb'] = $path;
        }



        $comic->update($valid_data);
        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if (!is_null($comic->thumb)) {
            Storage::delete($comic->thumb);
        }

        $comic->delete();
        return to_route('comics.index')->with('message', 'Modifica avvenuta con successo');;
    }
}
