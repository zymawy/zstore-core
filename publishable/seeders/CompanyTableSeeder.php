<?php

/*
 * This file is part of the Zstore App package.
 *
 * (c) zymawy Mallam <zymawy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;
use Zstore\Companies\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class)->create([
            'name' => 'Z-Store',
            'description' => 'متجر زي ستور ',
            'email' => 'info@zstore.com',
            'contact_email' => 'contact@zstore.com',
            'sales_email' => 'sales@zstore.com',
            'support_email' => 'support@zstore.com',
            'website' => 'http://zstore.com',
            'twitter' => 'https://twitter.com/zstore',
            'facebook' => 'https://www.facebook.com/zstore',
            'default' => true,
        ]);
    }
}
