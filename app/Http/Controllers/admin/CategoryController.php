<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category=Category::all();

        return view('admin.category.index',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['category'=>'required|min:4']);
        $categoryId = new Category ;
        $categoryId->name = $request->category ;
        $categoryId->icone = 'n';
        $categoryId->save();

        return redirect(route('admin.category'));


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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd($request);
        $categoryId = Category::find($id);
        $categoryId->icone = 'o';
        $categoryId->save();

        return redirect(route('admin.category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categoryId = Category::find($id);
        $categoryId->delete();
        return redirect(route('admin.category'));
    }
}
