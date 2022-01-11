<?php
use App\Product;
use App\Category;
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
//         $this->call(UserSeeder::class);
                 $this->call(\App\models\Product\ProductsSeeder::class);
        $this->call(\App\models\Category\CategoriesSeeder::class);
    }
}
