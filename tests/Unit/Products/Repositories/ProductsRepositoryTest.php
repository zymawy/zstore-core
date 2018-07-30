<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Unit\Products\Repositories;

use Zstore\Tests\TestCase;
use Zstore\Product\Models\Product;
use Zstore\Product\Repositories\ProductsRepository;

class ProductsRepositoryTest extends TestCase
{
	/** @test */
	function it_increments_the_views_counter()
	{
		$product = factory(Product::class)->create(['view_counts' => 0]);

		$this->assertSame(0, $product->view_counts);

		(new ProductsRepository)->increment('view_counts', $product);

		$this->assertSame(1, (int) $product->fresh()->view_counts);
	}

	/** @test */
	function it_decrements_the_views_counter()
	{
		$product = factory(Product::class)->create(['view_counts' => 1]);

		$this->assertSame(1, $product->view_counts);

		(new ProductsRepository)->decrement('view_counts', $product);

		$this->assertSame(0, (int) $product->fresh()->view_counts);
	}
}
