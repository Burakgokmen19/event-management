<?php

namespace Database\Seeders;

use App\Models\User;
use Hamcrest\Core\BothForms;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= User::all();
        for ($i=0; $i < 200; $i++) {
            $user = $users->random();
            \App\Models\Event::factory()->create([

                'user_id'=>$user->id

            ]);
        }
    }
}
