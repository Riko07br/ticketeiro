<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
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
            'categories' => Category::all(),
            'labels' => Label::all(),
            'users' => \App\Models\User::all()
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $formFields['stat_id'] = "1";
        $formFields['priority_id'] = "1";


        $ticket = Ticket::create($formFields);
        $ticket->categories()->sync($request->input('categories'));
        $ticket->labels()->sync($request->input('labels'));

        return redirect('/tickets');
    }
}
