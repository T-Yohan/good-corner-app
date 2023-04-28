<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $annonces = Annonce::paginate(5);
        $categories = Category::orderBy('name', 'asc')->get();

        return view('home',compact('annonces','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail()
    {
        //
        $annonces = Annonce::findOrFail($id);
    }


}
