<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Companies;

use Zstore\Http\Controller;
use Zstore\Companies\Models\Company;

class CompanyRepository
{
	/**
	 * Returns the default company.
	 *
	 * @return Company
	 */
	public function default() : Company
	{
		$company = Company::where(['status' => true, 'default' => true])->first();

		if (is_null($company)) {
			return $this->fake();
		}

		return $company;
	}

	/**
	 * Returns a testing company.
	 *
	 * @return Company
	 */
	public function fake() : Company
	{
		return Company::make([
	        'name' => 'Zstore e-commerce',
	        'description' => 'Laravel e-commerce solution.',
	        'email' => 'gocanto@Zstore.com',
	        'logo' => 'Zstore.jpg',
	        'slogan' => 'Zstore e-commerce.',
	        'contact_email' => 'contact@Zstore.com',
	        'sales_email' => 'sales@Zstore.com',
	        'support_email' => 'support@Zstore.com',
	        'phone_number' => '+966598084006',
	        'cell_phone' => '+966598084006',
	        'address' => '4576 SE 44',
	        'state' => 'OK',
	        'city' => 'Makkah',
	        'zip_code' => '79002',
	        'website' => 'http://Zstore.com',
	        'twitter' => 'https://twitter.com/_Zstore',
	        'facebook' => 'https://www.facebook.com/Zstoreecommerce',
	        'keywords' => 'Zstore',
	        'about' => 'Laravel e-commerce solution.',
	        'terms' => 'Zstore e-commerce terms & conditions.',
	        'refunds' => 'Zstore e-commerce refunds policies',
		]);
	}
}
