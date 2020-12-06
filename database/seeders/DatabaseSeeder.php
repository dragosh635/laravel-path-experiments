<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\Point;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        Team::factory( 10 )->create();
        User::factory( 25 )->create();
        Ticket::factory( 500 )->create();
        Point::factory( 200 )->create();
    }
}
