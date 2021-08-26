<?php

namespace Database\Seeders;

use  App\Models\Movies;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Movies::factory(10)->create();
    
      /*   \App\Models\User::create(
            [
                'name' => 'Dupont',
                'email' => 'dupont@la.fr',
                'password' => bcrypt('pass'),
            ]
        ); */
    }
}
 