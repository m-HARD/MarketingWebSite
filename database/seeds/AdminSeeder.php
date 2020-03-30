<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
        factory('App\User')->create(['email' => 'test@test.com']);
     */
    public function run()
    {
        factory('App\Admin')->create(['email' => 'admin@admin.com']);
    }
}
