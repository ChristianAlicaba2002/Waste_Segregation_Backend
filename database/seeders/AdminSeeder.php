<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Admin_Waste_Segregation',
            'email' => 'WasteSegregation@gmail.com',
            'password' => bcrypt('wastesegregation'),
        ]);
    }
}
