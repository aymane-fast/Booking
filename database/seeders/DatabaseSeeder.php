<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
// use Database\Seeders\AdminUserSeeder;
// use Database\Seeders\RoomSeeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   

        DB::table('users')->insert([
            'name' => 'Admin',
            'lname' => 'User',
            'departement' => 'Admin Department',
            'ppr' => 'adminppr',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10), // Generate a random remember token
            'created_at' => now(), // Set the created_at field to the current time
            'updated_at' => now(), 
        ]);

        // Insert amphitheaters
        for ($i = 1; $i <= 5; $i++) {
            DB::table('rooms')->insert([
                'room_name' => 'Amphi ' . $i,
                'capacity' => 600,
            ]);
        }

        // Insert "Salle M" rooms
        for ($i = 1; $i <= 12; $i++) {
            DB::table('rooms')->insert([
                'room_name' => 'Salle M ' . $i,
                'capacity' => 100,
            ]);
        }

        // Insert other rooms
        $otherRooms = ['Salle C 1', 'Salle G 1', 'Salle P 1'];
        foreach ($otherRooms as $roomName) {
            DB::table('rooms')->insert([
                'room_name' => $roomName,
                'capacity' => 100,
            ]);
        }

    }
}
