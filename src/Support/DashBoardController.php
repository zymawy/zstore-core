<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Support;

use Zstore\Http\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
	/**
	 * Loads the dashboard.
	 *
	 * @return void
	 */
	public function index()
	{
		if (view()->exists('dashboard.index')) {
			return view('dashboard.index');
		}

		return redirect('/');
	}
}
