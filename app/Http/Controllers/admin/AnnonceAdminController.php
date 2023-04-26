<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name','asc')->get();
        return view('admin.annonce.ajouter', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $annonceModel = new Annonce;
        $request->validate(['annonce'=>"require|min:5"]);
        $annonceModel->category_id = 1;
        $annonceModel->user_id = Auth::user()->id;
        $annonceModel->name = $request->name;
        $annonceModel->description = $request->description;
        $annonceModel->prix = $request->prix;


        // dd($request);

        $annonceModel->save();
        return redirect(route('admin.annonce.store'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $annonce = Annonce::findOrFail($id);
        $annonce = Annonce::orderBy('name','asc')->get();
        return view('admin.annonce.lister',compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $annonce = Annonce::findOrFail($id);
        $request->validate(['annonce'=>"required|min:5"]);
        $annonce->category_id = $request->category;
        $actu->description = $request->description;
        $actu->titre = $request->titre;
        $actu->save();
        return view('admin.annonce.modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
