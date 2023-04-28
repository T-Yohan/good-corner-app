<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //affichage de la liste
        $annonces = Annonce::paginate(5);

        return view('admin.annonce.lister',compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.annonce.ajouter', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $annonceModel = new Annonce;
        $request->validate(['name' => "required|min:5", 'prix' => "required"]);
        $annonceModel->category_id = 1;
        $annonceModel->user_id = Auth::user()->id;
        $annonceModel->name = $request->name;
        $annonceModel->description = $request->description;
        $annonceModel->prix = $request->prix;

        // dd($request);

        //gestion de chargement de l'image
        if ($request->file()) {
            $fileName = $request->image->store('public/images'); //renommer le fichier de destination
            $annonceModel->image = $fileName;
        }


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
        //une annonce avec $id
        $annonceEdit = Annonce::findOrFail($id);
        // les categories
        $categoryEdit = Annonce::orderBy('name', 'asc')->get();
        return view('admin.annonce.modifier', compact('annonceEdit','categoryEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request);

        $annonceUpd = Annonce::findOrFail($id);
        $request->validate(['name' => "required|min:5",'prix']);
        $annonceUpd->category_id = $request->category;   //reçois l'id dans le champ selectionné
        $annonceUpd->user_id = Auth::user()->id;
        $annonceUpd->name = $request->name;
        $annonceUpd->description = $request->description;
        $annonceUpd->prix = $request->prix;
        $annonceUpd->save(); //enregistrement

        if ($request->file()) {
            $fileName = $request->image->store('public/images'); //renommer le fichier de destination
            $annonceUpd->image = $fileName;


        }
        // return view('admin.annonce.modifier');
            return redirect('admin.annonce.update',compact('annonce'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
