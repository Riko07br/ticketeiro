<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function index() {
        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
        ]);

        Category::create($formFields);
        return redirect('/categories');
    }

    public function edit(Category $category) {

        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category) {

        $formFields = $request->validate([
            'title' => 'required',
        ]);

        $category->update($formFields);

        return redirect('/categories');
    }

    // public function destroy(Category $category) {

    //     $category->delete();
    //     return redirect('/categories');
    // }
}
