<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $user = User::factory()->create(
            [
                'name' => 'Mutekanga Joy',
                'email' => 'joy@mwesigwatechnologies.com',
                'password' => 'password'
            ]
        );

        Note::factory(10)->create([
            'user_id' => $user->id
        ]);


        $user2 = User::factory()->create(
            [
                'name' => 'Jackson Ssekyanzi Mwesigwa',
                'email' => 'jackson@mwesigwatechnologies.com',
                'password' => 'password'
            ]
        );
        Note::factory(10)->create([
            'user_id' => $user2->id
        ]);


        $user3 = User::factory()->create(
            [
                'name' => 'Ssemanda Jonathan',
                'email' => 'jonah@mwesigwatechnologies.com',
                'password' => 'password'
            ]
        );
        Note::factory(10)->create([
            'user_id' => $user3->id
        ]);
    }
}
