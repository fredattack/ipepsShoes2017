<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 20)->create();

//        factory(App\Shipment::class, 10)->create();

        factory(App\Adress::class, 25)->create();

    }

}
