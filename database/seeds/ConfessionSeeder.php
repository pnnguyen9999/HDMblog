<?php

use Illuminate\Database\Seeder;

class ConfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $numRecords = 50;
      factory(App\Confession::class,$numRecords)->create();
    }
}
