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

class Conditions implements FilterContract
{
	/**
	 * The requested conditions.
	 *
	 * @var int
	 */
	protected $conditions = null;

	/**
     * Create a new instance.
     *
     * @param string $conditions
     *
     * @return void
     */
	public function __construct(string $conditions, Builder $builder)
	{
		$this->builder = $builder;
		$this->conditions = $conditions;
	}

	/**
	 * Builds the query with the given category.
	 *
	 * @return Builder
	 */
	public function query() : Builder
	{
		if (trim($conditions = $this->conditions) !== '') {
			$this->builder->where('condition', 'LIKE', $conditions);
		}

		return $this->builder;
	}
}
