<?php

/*
 * This file is part of the Antvel App package.
 *
 * (c) zymawy Mallam <zymawy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(AddressBookTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(GroupingSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(DresserTableSeeder::class);
    }
}
