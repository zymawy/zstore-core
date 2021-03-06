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

trait PolicyMap
{
	/**
     * The policy mappings for Zstore.
     *
     * @var array
     */
    protected $policies = [
        \Zstore\Users\Models\User::class => UserPolicy::class,
    ];
}
