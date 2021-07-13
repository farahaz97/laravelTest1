<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Models\Product([
            'imagePath' => '\DV.png',
            'title' => 'Dianz Vitamin Premium',
            'quantity' => '8',
            'price' => '52'
        ]);
        $product-> save();

        $product = new  \App\Models\Product([
            'imagePath' => '\HB.png',
            'title' => 'Dianz Gold Honey Booster',
            'quantity' => '5',
            'price' => '39'
        ]);
        $product-> save();

        $product = new  \App\Models\Product([
            'imagePath' => '\dmelon.png',
            'title' => 'Dianz Dtox Dmelon',
            'quantity' => '3',
            'price' => '38'
        ]);
        $product-> save();

        $product = new  \App\Models\Product([
            'imagePath' => '\nano.png',
            'title' => 'Dianz Nano Ultra Lightening White',
            'quantity' => '2',
            'price' => '45'
        ]);
        $product-> save();
    }
}
