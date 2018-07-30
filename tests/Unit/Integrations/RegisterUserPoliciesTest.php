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
use Zstore\Users\Models\User;
use Zstore\Users\Policies\UserPolicy;
use Illuminate\Contracts\Auth\Access\Gate;

class RegisterUserPoliciesTest extends TestCase
{
	public function setUp()
    {
    	parent::setUp();
    }

	/** @test */
	function it_is_able_to_register_the_Zstore_user_policies_within_the_application()
	{
		$this->app->booted(function () {
			$policy = $this->app->make(Gate::class)->getPolicyFor(User::class);
			$this->assertInstanceOf(UserPolicy::class, $policy);
			$this->assertNotNull($policy);
    	});
	}
}
