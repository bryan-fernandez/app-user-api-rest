<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    const USERS_QUANTITY = 100;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->dropAllData();
        $this->createFakeData();
    }

    private function dropAllData(){
        User::truncate();
    }

    private function createFakeData(){
        User::factory($this::USERS_QUANTITY)->create();
    }
}
