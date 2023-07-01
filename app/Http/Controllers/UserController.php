<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {

    //show all users
    public function index() {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user) {

        if ($user->user_type == "adm") {
            $tickets = Ticket::all();
        } else if ($user->user_type == "agt") {
            $tickets = $user->agent_tickets()->get();
        } else {
            $tickets = $user->user_tickets()->get();
        }

        return view('users.show', [
            'user' => $user,
            'tickets' => $tickets
        ]);
    }
}
