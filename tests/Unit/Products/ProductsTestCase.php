<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Unit\Products;

use Zstore\Tests\TestCase;

class ProductsTestCase extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->repository = $this->app->make('Zstore\Product\Products');
	}

	protected function createProductWithPictures($attr = [], $times = 3)
	{
		$product = factory('Zstore\Product\Models\Product')->create($attr);

		for ($i=0; $i < $times; $i++) {
			factory('Zstore\Product\Models\ProductPictures')->create([
				'product_id' => $product->id,
				'path' => $this->persistentUpload('images/products')->store('images/products/' . $product->id)
			]);
		}

		return $product;
	}

	protected function data()
	{
		return [
			'category' => factory('Zstore\Categories\Models\Category')->create()->id,
			'name' => 'Foo Bar',
			'description' => 'Foo Bar Biz',
			'cost' => 849,
			'price' => 949,
			'stock' => 10,
			'low_stock' => 2,
			'brand' => 'fake brand',
			'condition' => 'new',
			'status' => true,
			'features' => [
				'weight' => '12',
				'dimensions' => '8x8x8',
				'color' => 'black',
			]
		];
	}
}
