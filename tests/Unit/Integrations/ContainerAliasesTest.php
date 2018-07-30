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
use Zstore\Features\Repositories\FeaturesRepository;
use Zstore\Features\Repositories\FeaturesCacheRepository;
use Zstore\Categories\Repositories\CategoriesRepository;
use Zstore\Categories\Repositories\CategoriesCacheRepository;

class ContainerAliasesTest extends TestCase
{
	/** @test */
	function it_returns_category_repository_by_its_alias()
	{
		$categoriesRepository = $this->app->make('category.repository');
		$categoriesRepositoryCache = $this->app->make('category.repository.cahe');

		$this->assertNotNull($categoriesRepository);
		$this->assertNotNull($categoriesRepositoryCache);
		$this->assertInstanceOf(CategoriesRepository::class, $categoriesRepository);
		$this->assertInstanceOf(CategoriesCacheRepository::class, $categoriesRepositoryCache);
	}

	/** @test */
	function it_returns_features_repository_by_its_alias()
	{
		$featuresRepository = $this->app->make('product.features.repository');
		$featuresRepositoryCache = $this->app->make('product.features.repository.cahe');

		$this->assertNotNull($featuresRepository);
		$this->assertNotNull($featuresRepositoryCache);
		$this->assertInstanceOf(FeaturesRepository::class, $featuresRepository);
		$this->assertInstanceOf(FeaturesCacheRepository::class, $featuresRepositoryCache);
	}
}
