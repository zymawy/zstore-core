<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Features;

use Zstore\Tests\TestCase;
use Zstore\Product\Models\Product;

class SearchTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->app->make('router')->get('productsSearch', '\Zstore\Product\SearchController@index');
	}

	/** @test */
	function it_can_search()
	{
		$category = factory('Zstore\Categories\Models\Category')->create(['name' => 'aaa']);
		factory(Product::class)->create(['name' => 'aaa', 'category_id' => $category->id]);
		factory(Product::class)->create(['name' => 'bbb']);
		factory(Product::class)->create(['name' => 'ccc', 'category_id' => $category->id]);
		factory(Product::class)->create(['name' => 'ddd']);

		$response = $this->call('GET', 'productsSearch' , ['q' => 'aaa'])->assertSuccessful();

		tap($response->json(), function ($data) {
			$this->assertTrue(count($data['products']['results']) > 0);
			$this->assertTrue(count($data['products']['categories']) > 0);
			$this->assertCount(4, $data['products']['suggestions']);
			$this->assertTrue(isset($data['products']['suggestions']));
		});
	}
}
