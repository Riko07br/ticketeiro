<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Label;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller {

    function abort_by_role(Ticket $ticket) {

        $user = auth()->user();

        if (!($user->role->id == "1"
            || $user->id == $ticket->user->id
            || $user->id == $ticket->agent->id)) {
            abort(403, 'Unauthorized Action');
        }
    }

    //show all tickets
    public function index() {

        $user = auth()->user();

        if ($user->role->id == "1") {
            $tickets = Ticket::all();
        } else if ($user->role->id == "2") {
            $tickets = $user->agent_tickets()->get();
        } else {
            $tickets = $user->user_tickets()->get();
        }

        return view('tickets.index', [
            'tickets' => $tickets
        ]);
    }

    public function show(Ticket $ticket) {

        $this->abort_by_role($ticket);

        return view('tickets.show', [
            'ticket' => $ticket
        ]);
    }

    public function create() {
        return view('tickets.create', [
            'categories' => Category::all(),
            'labels' => Label::all(),
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categories' => 'array',
            'labels' => 'array',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'stat_id' => '1',
            'priority_id' => '1',
            'title' =>  $formFields['title'],
            'description' =>  $formFields['description'],
        ]);

        $ticket->categories()->sync($formFields['categories']);
        $ticket->labels()->sync($formFields['labels']);

        return redirect(auth()->user()->role->title . '/tickets');
    }

    public function edit(Ticket $ticket) {

        $this->abort_by_role($ticket);

        return view('tickets.edit', [
            'categories' => Category::all(),
            'labels' => Label::all(),
            'ticket' => $ticket,
        ]);
    }

    public function update(Request $request, Ticket $ticket) {

        $this->abort_by_role($ticket);

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

        return redirect(auth()->user()->role->title . '/tickets');
    }

    public function destroy(Ticket $ticket) {

        $ticket->categories()->detach();
        $ticket->labels()->detach();
        $ticket->delete();
        return redirect(auth()->user()->role->title . '/tickets');
    }
}
