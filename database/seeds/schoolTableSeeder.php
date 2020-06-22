<?php

use App\school;
use Illuminate\Database\Seeder;

class schoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(school::class, 1)->create();
    }
}
