<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FakeAllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Allocations::factory(300)->create(); 
    }
}
