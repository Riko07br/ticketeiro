<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller {

    //show all tickets
    public function index() {
        return view('tickets.index', [
            'tickets' => Ticket::all()
        ]);
    }

    public function show(Ticket $ticket) {
        return view('tickets.show', [
            'ticket' => $ticket
        ]);
    }

    public function create() {
        return view('tickets.create', [
            'categories' => CategoryController::getAll(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $formFields['stat_id'] = "1";
        $formFields['priority_id'] = "1";

        //dd($formFields);

        Ticket::create($formFields);

        return redirect('/');
    }
}
