<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public static function getAll() {
        return Category::all();
    }

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
        return redirect('/');
    }
}
