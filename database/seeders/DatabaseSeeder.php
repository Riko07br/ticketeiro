<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        User::factory()->create([
            'user_type' => "adm",
        ]);

        $userAmount = 10;
        User::factory($userAmount)->create([
            'user_type' => "usr",
        ]);

        $agentAmount = 3;
        User::factory($agentAmount)->create([
            'user_type' => "agt",
        ]);

        $categories = array('Uncategorized', 'Payment', 'Usability', 'Tecnical', 'Fire related');
        foreach ($categories as $c) {
            Category::create([
                'title' => $c
            ]);
        }

        $labels = array('bug', 'question', 'feedback', 'annoy the agents');
        foreach ($labels as $l) {
            Label::create([
                'title' => $l
            ]);
        }

        $stats = array('open', 'working', 'closed');
        foreach ($stats as $s) {
            Stat::create([
                'title' => $s
            ]);
        }

        $priorities = array('very low', 'low', 'medium', 'high', 'very high');
        foreach ($priorities as $p) {
            Priority::create([
                'title' => $p
            ]);
        }

        $ticketAmount = 5;
        for ($i = 1; $i < ($ticketAmount + 1); $i++) {
            $ticket = Ticket::factory()->create([
                'user_id' => rand(1, $userAmount),
                'agent_id' => rand($userAmount + 1, $userAmount + $agentAmount),
                'stat_id' => rand(1, count($stats)),
                'priority_id' => rand(1, count($priorities))
            ]);

            $ticket->categories()->sync($this->random_id_array(count($categories)));
            $ticket->labels()->sync($this->random_id_array(count($labels)));
        }
    }
}
