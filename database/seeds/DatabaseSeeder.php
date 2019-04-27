<?php

use Illuminate\Database\Seeder;

use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CategoriesSeeder');
    }
}


class CategoriesSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array('name' => 'Auto/moto'));
        Category::create(array('name' => 'Finance'));
        Category::create(array('name' => 'Music'));
    }

}