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

class RegisterEventsTest extends TestCase
{
	public function setUp()
    {
    	parent::setUp();

    	$this->events = [
    		\Zstore\Features\Events\FeatureNameWasUpdated::class,
    		\Zstore\Users\Events\ProfileWasUpdated::class,
    	];
    }

	/** @test */
	function it_is_able_to_register_the_Zstore_events_within_the_application()
	{
		$this->app->booted(function () {
	    	foreach ($this->events as $event) {
	    		$this->assertTrue(count($this->app->make('events')->getListeners($event)) > 0);
	    	}
    	});
	}
}
