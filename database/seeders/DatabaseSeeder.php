<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\Stat;
use App\Models\User;
use App\Models\Label;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Priority;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder {

    function random_id_array(int $array_max_size): array {
        $amount = rand(1, $array_max_size);
        $randomArray = array();

        for ($i = 0; $i < $amount; $i++) {
            array_push($randomArray, rand(1, $amount));
        }

        return $randomArray;
    }

    /**
     * Seed the application's database.
     */
    public function run(): void {

        $roles = array('admin', 'agent', 'user');
        foreach ($roles as $r) {
            Role::create([
                'title' => $r,
                'description' => $r,
            ]);
        }

        User::factory()->create([
            'role_id' => "1",
            'email' => 'adm@adm.com',
            'password' => '123456',
        ]);

        $agentAmount = 3;
        User::factory($agentAmount)->create(['role_id' => "2"]);

        $userAmount = 10;
        User::factory($userAmount)->create(['role_id' => "3"]);


        $categories = array('Pagamento', 'Usabilidade', 'Tecnica', 'Fogo');
        foreach ($categories as $c) {
            Category::create([
                'title' => $c,
                'description' => $c,
            ]);
        }

        $labels = array('Bug', 'Dúvida', 'Feedback', 'Encher o saco');
        foreach ($labels as $l) {
            Label::create([
                'title' => $l
            ]);
        }

        $stats = array('Criado', 'Designado', 'Pausado', 'Resolvido', 'Não resolvido');
        foreach ($stats as $s) {
            Stat::create([
                'title' => $s
            ]);
        }

        $priorities = array('Baixíssima', 'Baixa', 'Normal', 'Urgente', 'Urgentissíma');
        foreach ($priorities as $p) {
            Priority::create([
                'title' => $p
            ]);
        }

        $ticketAmount = 5;
        for ($i = 1; $i < ($ticketAmount + 1); $i++) {
            $ticket = Ticket::factory()->create([
                'agent_id' => rand(2, 2 + $agentAmount),
                'user_id' => rand(3 + $agentAmount, 3 + $agentAmount + $userAmount),
                'stat_id' => rand(1, count($stats)),
                'priority_id' => rand(1, count($priorities))
            ]);

            $ticket->categories()->sync($this->random_id_array(count($categories)));
            $ticket->labels()->sync($this->random_id_array(count($labels)));
        }
    }
}
