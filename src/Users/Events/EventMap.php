<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Users\Events;

trait EventMap
{
	/**
     * All of the Zstore User event / listener mappings.
     *
     * @var array
     */
    protected $events = [
        \Illuminate\Notifications\Events\NotificationSent::class => [
            \Zstore\Users\Listeners\UpdateNotificationType::class
        ],

		\Zstore\Users\Events\ProfileWasUpdated::class => [
            \Zstore\Users\Listeners\UpdateProfile::class,
            \Zstore\Users\Listeners\SendNewEmailConfirmation::class,
        ],

        \Zstore\Features\Events\FeatureNameWasUpdated::class => [
            \Zstore\Features\Listeners\UpdateFeatureName::class,
        ],
    ];
}
