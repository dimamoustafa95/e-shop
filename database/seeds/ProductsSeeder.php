<?php
namespace App\models\Product;
use App\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     factory(Product::class,30)->create();
    }

}
