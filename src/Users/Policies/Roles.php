<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Users\Policies;

class Roles
{
	/**
	 * The default registration role.
	 *
	 * @return string
	 */
	public static function default()
	{
		return 'customer';
	}

	/**
	 * The allowed roles.
	 *
	 * @return array
	 */
	public static function allowed()
	{
		return ['admin', 'seller', 'customer'];
	}

	/**
	 * The manager roles.
	 *
	 * @return array
	 */
	public static function managers()
	{
		return ['admin', 'seller'];
	}
}
