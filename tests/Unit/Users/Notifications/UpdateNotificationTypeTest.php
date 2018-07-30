<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Unit\UsersNotifications;

use Zstore\Tests\TestCase;
use Zstore\Users\Models\User;
use Zstore\Users\Listeners\UpdateNotificationType;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Events\NotificationSent;

class UpdateNotificationTypeTest extends TestCase
{
	/** @test */
	function it_updates_the_given_notification_type_to_be_aligned_with_the_one_provided_by_the_application()
	{
		$notifiable = factory(User::class)->create();
		$response = factory(DatabaseNotification::class)->states('unread')->create([
			'notifiable_id' => $notifiable->id,
			'notifiable_type' => 'App\User'
		]);

		$this->app->make(UpdateNotificationType::class)->handle(
			new NotificationSent($notifiable, collect(), 'database', $response)
		);

		tap($response->fresh(), function ($response) use ($notifiable) {
			$this->assertEquals(User::class, $response->notifiable_type);
			$this->assertTrue(strcmp('App\User', $response->notifiable_type) !== 0);
		});
	}
}
