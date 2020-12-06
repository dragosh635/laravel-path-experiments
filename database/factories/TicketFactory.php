<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketFactory extends Factory {
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            'title'       => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'team_id'     => function ( array $ticket ) {
                return DB::table( 'teams' )
                         ->inRandomOrder()
                         ->first()
                    ->id;
            },
        ];
    }
}
