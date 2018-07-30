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

use Zstore\Zstore;
use Zstore\Tests\TestCase;

class RegisterProvidersTest extends TestCase
{
	/** @test */
	function check_whether_the_Zstore_providers_were_loaded()
	{
		foreach (Zstore::providers() as $provider) {
			$this->assertArrayHasKey($provider, $this->app->getLoadedProviders());
		}
	}
}
