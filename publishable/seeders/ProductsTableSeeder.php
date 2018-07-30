<?php

/*
 * This file is part of the Zstore App package.
 *
 * (c) zymawy Mallam <zymawy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;
use Zstore\Product\Models\{ Product, ProductPictures };

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i=1; $i < 2; $i++) {
            $product = factory(Product::class)->create();

            factory(ProductPictures::class, 5)->create([
                'product_id' => $product->id
            ]);
        }
    }
}
