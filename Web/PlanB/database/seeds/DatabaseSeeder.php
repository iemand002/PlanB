<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        $this->call(ThemaSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(MilestoneTableSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(SectionTableSeeder::class);
    }
}
