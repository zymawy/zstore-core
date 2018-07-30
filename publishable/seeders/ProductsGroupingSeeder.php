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

class GroupingSeeder extends Seeder
{
    public function run()
    {
    	$products = Product::whereIn('id', [2,1])->get();

    	Product::first()->groupWith($products);
    }
}
