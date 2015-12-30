<?php

use \Illuminate\Foundation\Testing\DatabaseTransactions;

class EditProfileTest extends TestCase
{
    use DatabaseTransactions;

    public function testEditProfile()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('account')
            ->click('Edit profile')
            ->seePageIs('account/edit-profile')
            ->seeInField('name', 'juan leon')
            ->type('Juanito', 'name')
            ->press('Update profile')
            ->seePageIs('account')
            ->see('Your profile has been update')
            ->seeInDatabase('users', [
                'email' => $user->email,
                'name' => 'Juanito'
            ]);
    }
}