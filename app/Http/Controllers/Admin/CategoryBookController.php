<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryBook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Category/Index', [
            'categori_books'    => CategoryBook::when($request->search, function ($query, $search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            })->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'lokasi'  => 'required'
        ]);
        CategoryBook::create([
            'nama'  => $request->nama,
            'slug'  => Str::slug($request->nama),
            'lokasi'    => $request->lokasi
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryBook $category)
    {
        return inertia('Category/Show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBook $category)
    {
        return inertia('Category/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryBook $category)
    {
        $request->validate([
            'nama'  => 'required',
            'lokasi'  => 'required'
        ]);

        $category->update([
            'nama'  => $request->nama,
            'lokasi'    => $request->lokasi
        ]);

        return redirect()
            ->route('category.index')
            ->with('success', 'Category Updated');
        // return Redirect::route('category.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryBook  $categoryBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryBook $category)
    {
        $category->delete();
        return redirect()
            ->route('category.index')
            ->with('success', 'Category Deleted');
    }
}
