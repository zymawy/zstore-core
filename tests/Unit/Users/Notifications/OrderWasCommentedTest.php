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
use Zstore\Notifications\Parsers\Label;
use Zstore\Users\Notifications\OrderWasCommented;

class OrderWasCommentedTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->routes = [ //while refactoring Zstore orders component.
			'seller' => 'orders.show_seller_order',
			'customer' => 'orders.show_order',
		];

		$this->app->make('router')->get('seller/{orderId}', [
			'uses' => function() {}, 'as' => $this->routes['seller']
		]);

		$this->app->make('router')->get('customer/{orderId}', [
			'uses' => function() {}, 'as' => $this->routes['customer']
		]);
	}

	/** @test */
	function an_owner_notification_might_contain_the_right_information()
	{
		$seller = factory(User::class)->states('seller')->create();
		$customer = factory(User::class)->states('customer')->create();
		$order = factory('Zstore\Orders\Models\Order')->create(['user_id' => $customer->id, 'seller_id' => $seller->id]);

		$order->owner->notify(new OrderWasCommented($order));

		tap($order->owner->notifications->first(), function ($notification) use ($order) {

			$this->assertEquals($order->owner->id, $notification->notifiable_id);
			$this->assertEquals(OrderWasCommented::class, $notification->type);
			$this->assertEquals(User::class, $notification->notifiable_type);
			$this->assertNull($notification->read_at);

			$this->assertEquals($notification->data['label'], Label::make('push.comments')->with($notification->data)->print());
			$this->assertEquals(route($this->routes['customer'], $order), $notification->data['source_path']);
			$this->assertEquals($order->id, $notification->data['source_id']);
			$this->assertEquals('new', $notification->data['status']);
		});
	}

	/** @test */
	function a_seller_notification_might_contain_the_right_information()
	{
		$seller = factory(User::class)->states('seller')->create();
		$owner = factory(User::class)->make(['id' => 2]);
		$order = factory('Zstore\Orders\Models\Order')->make(['id' => 1, 'user_id' => $owner->id, 'seller_id' => $seller->id]);

		$order->seller->notify(new OrderWasCommented($order));

		tap($order->seller->notifications->first(), function ($notification) use ($order) {
			$this->assertEquals($order->seller->id, $notification->notifiable_id);
			$this->assertEquals(OrderWasCommented::class, $notification->type);
			$this->assertEquals(User::class, $notification->notifiable_type);
			$this->assertNull($notification->read_at);

			$this->assertEquals($notification->data['label'], Label::make('push.comments')->with($notification->data)->print());
			$this->assertEquals(route($this->routes['seller'], $order), $notification->data['source_path']);
			$this->assertEquals('new', $notification->data['status']);
			$this->assertEquals($order->id, $notification->data['source_id']);
		});
	}
}
