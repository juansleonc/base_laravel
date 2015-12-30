<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChangePasswordTest extends TestCase
{
    use DatabaseTransactions;

    public function testChangePassword()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('account')
            ->click('Change password')
            ->seePageIs('account/change-password')
            ->type('qwerty123', 'current_password')
            ->type('newpassword', 'password')
            ->type('newpassword', 'password_confirmation')
            ->press('Change password')
            ->seePageIs('account')
            ->see('Your password has been changed');

        $this->assertTrue(
            Hash::check('newpassword', $user->password),
            'The use password was not changed'
        );

    }
}