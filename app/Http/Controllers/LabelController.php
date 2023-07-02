<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller {

    public function index() {
        return view('labels.index', [
            'labels' => Label::all()
        ]);
    }

    public function create() {
        return view('labels.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
        ]);

        Label::create($formFields);
        return redirect('/');
    }
}
