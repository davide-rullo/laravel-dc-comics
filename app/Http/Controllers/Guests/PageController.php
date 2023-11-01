<?php

namespace App\Http\Controllers\Guests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class PageController extends Controller
{
    public function index()
    {
        return view('comics.index',  ['comics' => Comic::all()]);
    }
}
