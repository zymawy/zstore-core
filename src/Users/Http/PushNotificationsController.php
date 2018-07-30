<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Users\Http;

use Zstore\Http\Controller;
use Zstore\Users\Repositories\PusNotificationsRepository;

class PushNotificationsController extends Controller
{
	/**
	 * Shows the signed user notifications list.
	 *
	 * @param  PusNotificationsRepository $notifications
	 *
	 * @return void
	 */
	public function index(PusNotificationsRepository $notifications)
	{
		return [
			'unread' => $notifications->unread(),
			'read' => $notifications->read(),
		];
	}
}
