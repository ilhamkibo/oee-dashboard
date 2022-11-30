<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Availability;
use App\Models\Quality;
use App\Models\Target;
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
        // \App\Models\User::factory(11)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Ilham Prima Y',
            'username' => 'ilhamprima',
            'email' => 'ilham@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true
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
            'created_at' => '2022-11-23 00:01:00',
            'updated_at' => '2022-11-23 02:00:00'
        ]);

        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'MAINTENANCE',
            'created_at' => '2022-11-23 02:01:00',
            'updated_at' => '2022-11-23 03:00:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'DRY TEST',
            'created_at' => '2022-11-23 03:01:00',
            'updated_at' => '2022-11-23 05:00:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'SERVICE',
            'created_at' => '2022-11-23 05:01:00',
            'updated_at' => '2022-11-23 06:30:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'WET TEST',
            'created_at' => '2022-11-23 06:31:00',
            'updated_at' => '2022-11-23 08:40:00'
        ]);
        Availability::create([
            'mc_id' => '1',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'JEGLEK',
            'created_at' => '2022-11-23 08:40:00',
            'updated_at' => '2022-11-23 13:40:00'
        ]);

        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'MACHINE RUNNING',
            'created_at' => '2022-11-23 00:01:00',
            'updated_at' => '2022-11-23 02:00:00'
        ]);

        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'MAINTENANCE',
            'created_at' => '2022-11-23 02:01:00',
            'updated_at' => '2022-11-23 03:00:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'DRY TEST',
            'created_at' => '2022-11-23 03:01:00',
            'updated_at' => '2022-11-23 05:00:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'SERVICE',
            'created_at' => '2022-11-23 05:01:00',
            'updated_at' => '2022-11-23 06:30:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'STOP',
            'status' => '0',
            'message' => 'WET TEST',
            'created_at' => '2022-11-23 06:31:00',
            'updated_at' => '2022-11-23 08:40:00'
        ]);
        Availability::create([
            'mc_id' => '2',
            'name' => 'RUN',
            'status' => '0',
            'message' => 'LARIII',
            'created_at' => '2022-11-23 08:40:00',
            'updated_at' => '2022-11-23 13:40:00'
        ]);
        Target::create([
            'timestamp' => '2022-11-23 08:40:00',
            'TARGET' => 7
        ]);
        Target::create([
            'timestamp' => '2022-11-23 09:10:00',
            'TARGET' => 10
        ]);
        Target::create([
            'timestamp' => '2022-11-23 09:40:00',
            'TARGET' => 13
        ]);
        Target::create([
            'timestamp' => '2022-11-23 10:20:00',
            'TARGET' => 16
        ]);
        Quality::create([
            'Status' => 'OK',
            'value_a' => 3,
            'value_b' => 5,
            'value_c' => 11,
            'ModelId' => '1',
            'Model' => '20221109',
            'created_at' => '2022-11-23 08:40:00'
        ]);
        Quality::create([
            'Status' => 'NG',
            'value_a' => 6,
            'value_b' => 2,
            'value_c' => 9,
            'ModelId' => '2',
            'Model' => '20221110',
            'created_at' => '2022-11-23 09:10:00'
        ]);
        Quality::create([
            'Status' => 'OK',
            'value_a' => 2,
            'value_b' => 4,
            'value_c' => 10,
            'ModelId' => '3',
            'Model' => '20221112',
            'created_at' => '2022-11-23 09:40:00'
        ]);
    }
}
