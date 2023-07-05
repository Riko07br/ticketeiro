<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller {

    public function index() {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user) {

        if ($user->role->id == "1") {
            $tickets = Ticket::all();
        } else if ($user->role->id == "2") {
            $tickets = $user->agent_tickets()->get();
        } else {
            $tickets = $user->user_tickets()->get();
        }

        return view('users.show', [
            'user' => $user,
            'tickets' => $tickets
        ]);
    }

    public function edit(User $user) {

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user) {

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'role_id' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);  //hash password

        if ($user->role->id == "1") {
            $formFields['role_id'] = "1";
        }

        //ainda tem mais coisas por ter agente e usuario

        $user->update($formFields);
    }
}
