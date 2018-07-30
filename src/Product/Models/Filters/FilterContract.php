<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Product\Models\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterContract
{
	/**
	 * Builds the query with the given value.
	 *
	 * @return Builder
	 */
	public function query() : Builder;
}
