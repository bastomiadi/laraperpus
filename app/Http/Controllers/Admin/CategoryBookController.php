<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBookRequest;
use App\Models\CategoryBook;
use App\Repositories\CategoryBookRepository;
use Illuminate\Http\Request;


class CategoryBookController extends Controller
{

    private $categoryBookRepository;

    public function __construct(CategoryBookRepository $categoryBookRepository)
    {
        $this->categoryBookRepository = $categoryBookRepository; //
    }

    public function index(Request $request)
    {
        return inertia('Category/Index', [
            'categori_books'    => $this->categoryBookRepository->getAll($request) //mengambil data dari CategoryBookRepository
        ]);
    }

    public function create()
    {
        return inertia('Category/Create');
    }

    public function store(CategoryBookRequest $request)
    {
        $this->categoryBookRepository->storeAll($request); //menerina data yang sudah divalidasi di categoryBookRequest dan mengirim ke categoryBookRepository untuk di simpan di method storeAll
        return redirect()->route('category.index')->with('success', 'Category Created');
    }

    public function show(CategoryBook $category)
    {
        return inertia('Category/Show', [
            'category' => $category
        ]);
    }

    public function edit(CategoryBook $category)
    {
        return inertia('Category/Edit', [
            'category' => $category
        ]);
    }

    public function update(CategoryBookRequest $request, CategoryBook $category)
    {
        $this->categoryBookRepository->updateAll($request, $category);
        return redirect()->route('category.index')->with('success', 'Category Updated');
    }

    public function destroy(CategoryBook $category)
    {
        $category->delete();
        return redirect()
            ->route('category.index')
            ->with('success', 'Category Deleted');
    }
}
