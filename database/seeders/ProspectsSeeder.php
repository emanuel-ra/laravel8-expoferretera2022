<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\prospects;

class ProspectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        prospects::factory()->count(30)->create();
        

    }
}
