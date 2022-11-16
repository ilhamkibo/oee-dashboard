<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Availability;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ilham Prima Y',
            'username' => 'ilhamprima',
            'email' => 'ilham@gmail.com',
            'password' => bcrypt('admin123')
        ]);
      
        User::create([
            'name' => 'Aceng Fikri',
            'username' => 'cengaceng',
            'email' => 'aceng@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        Availability::create([
            'mc_id' => '1',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'MACHINE RUNNING',
            'created_at' => '2022-10-27 00:01:00',
            'updated_at' => '2022-10-27 02:00:00'
        ]);

        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'MAINTENANCE',
            'created_at' => '2022-10-27 02:01:00',
            'updated_at' => '2022-10-27 03:00:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'DRY TEST',
            'created_at' => '2022-10-27 03:01:00',
            'updated_at' => '2022-10-27 05:00:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'SERVICE',
            'created_at' => '2022-10-27 05:01:00',
            'updated_at' => '2022-10-27 06:30:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'WET TEST',
            'created_at' => '2022-10-27 06:31:00',
            'updated_at' => '2022-10-27 08:40:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'JEGLEK',
            'created_at' => '2022-11-16 08:40:00',
            'updated_at' => '2022-11-16 13:40:00'
        ]);

        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'MACHINE RUNNING',
            'created_at' => '2022-10-27 00:01:00',
            'updated_at' => '2022-10-27 02:00:00'
        ]);

        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'MAINTENANCE',
            'created_at' => '2022-10-27 02:01:00',
            'updated_at' => '2022-10-27 03:00:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'DRY TEST',
            'created_at' => '2022-10-27 03:01:00',
            'updated_at' => '2022-10-27 05:00:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'SERVICE',
            'created_at' => '2022-10-27 05:01:00',
            'updated_at' => '2022-10-27 06:30:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'WET TEST',
            'created_at' => '2022-10-27 06:31:00',
            'updated_at' => '2022-10-27 08:40:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'LARIII',
            'created_at' => '2022-11-16 08:40:00',
            'updated_at' => '2022-11-16 13:40:00'
        ]);
    }
}
