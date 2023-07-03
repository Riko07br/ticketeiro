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
            'title' => 'required',
            'description' => 'required',
            'categories' => 'array',
            'labels' => 'array',
        ]);

        $formFields['user_id'] = auth()->id;
        $formFields['stat_id'] = "1";
        $formFields['priority_id'] = "1";

        $ticket = Ticket::create($formFields);
        $ticket->categories()->sync($formFields['categories']);
        $ticket->labels()->sync($formFields['labels']);

        return redirect('/tickets');
    }

    public function edit(Ticket $ticket) {
        return view('tickets.edit', [
            'categories' => Category::all(),
            'labels' => Label::all(),
            'ticket' => $ticket,
        ]);
    }

    public function update(Request $request, Ticket $ticket) {

        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categories' => 'array',
            'labels' => 'array',
        ]);

        $ticket->update([
            'user_id' => $ticket->user->id,
            'stat_id' => '1',
            'priority_id' => '1',
            'title' =>  $formFields['title'],
            'description' =>  $formFields['description'],
        ]);

        $ticket->categories()->sync($formFields['categories']);
        $ticket->labels()->sync($formFields['labels']);

        return redirect('/tickets');
    }

    public function destroy(Ticket $ticket) {

        $ticket->delete();
        return redirect('/tickets');
    }
}
