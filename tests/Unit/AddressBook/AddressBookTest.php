<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Tests\Unit\AddressBook;

use Zstore\Tests\TestCase;

class AddressBookTest extends TestCase
{
    /** @test */
    function an_address_belongs_to_a_user()
    {
        $user = factory('Zstore\Users\Models\User')->create();
        $address = factory('Zstore\AddressBook\Models\Address')->create(['user_id' => $user->id]);

        $this->assertInstanceOf('Zstore\Users\Models\User', $address->user);
    }
}
