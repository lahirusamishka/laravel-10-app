<?php
// Seeder třída, která vytvoří demo uživatele s admin oprávněním
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Employee;
use App\Room;
use App\Key;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => Hash::make("password"),
            'admin' => true,
        ]);

        //factory(Room::class, 5)->create();
        //factory(Employee::class, 10)->create();
        //factory(Key::class, 5)->create();
    }
}
