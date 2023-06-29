<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        $userAmount = 10;
        \App\Models\User::factory($userAmount)->create();

        $stats = array('open', 'working', 'closed');
        foreach ($stats as $s) {
            \App\Models\Stat::create([
                'title' => $s
            ]);
        }

        $categories = array('hardware', 'excel', 'login', 'operating system', 'non related');
        foreach ($categories as $c) {
            \App\Models\Category::create([
                'title' => $c
            ]);
        }

        $priorities = array('very low', 'low', 'medium', 'high', 'very high');
        foreach ($priorities as $p) {
            \App\Models\Priority::create([
                'title' => $p
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            \App\Models\Ticket::factory()->create([
                'user_id' => rand(1, $userAmount),
                'stat_id' => rand(1, count($stats)),
                'category_id' => rand(1, count($categories)),
                'priority_id' => rand(1, count($priorities))
            ]);
        }
    }
}
