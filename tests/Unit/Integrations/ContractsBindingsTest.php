<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Unit\Integrations;

use Zstore\Tests\TestCase;
use Zstore\Contracts\CategoryRepositoryContract;
use Zstore\Contracts\FeaturesRepositoryContract;
use Zstore\Features\Repositories\FeaturesRepository;
use Zstore\Categories\Repositories\CategoriesRepository;

class ContractsBindingsTest extends TestCase
{
	/** @test */
	function it_returns_the_categories_repository_object_when_referring_to_its_contract()
	{
		$categoriesRepository = $this->app->make(CategoryRepositoryContract::class);

		$this->assertNotNull($categoriesRepository);
		$this->assertInstanceOf(CategoriesRepository::class, $categoriesRepository);
	}

	/** @test */
	function it_returns_the_features_repository_object_when_referring_to_its_contract()
	{
		$categoriesRepository = $this->app->make(FeaturesRepositoryContract::class);

		$this->assertNotNull($categoriesRepository);
		$this->assertInstanceOf(FeaturesRepository::class, $categoriesRepository);
	}
}
