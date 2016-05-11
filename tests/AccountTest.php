<?php

class AccountTest extends TestCase
{
    /**
     * Tests if a logged in user can reach the account index
     *
     * @return void
     */
    public function testAccountIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/account')
             ->see('Account');
    }

    /**
     * Tests if the user can edit his account
     *
     * @return void
     */
    public function testCanEditAccount()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/account/edit')
             ->see('Account wijzigen')
             ->type('Test Naam', 'name')
             ->press('Account wijzigen')
             ->seePageIs('/account')
             ->see('Uw gegevens zijn bijgewerkt!')
             ->see('Test Naam');
    }

    /**
     * Tests if the user can edit his email address
     *
     * @return void
     */
    public function testCanEditEmail()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/account/email/edit')
             ->see('E-mailadres wijzigen')
             ->type('test@test.nl', 'email')
             ->type('test@test.nl', 'email_confirmation')
             ->press('E-mailadres wijzigen')
             ->seePageIs('/account')
             ->see('Uw e-mailadres is bijgewerkt.')
             ->see('test@test.nl');
    }

    /**
     * Tests if the user can edit his email address when supplying
     * two different email addresses
     *
     * @return void
     */
    public function testCantEditWithWrongEmail()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/account/email/edit')
             ->see('E-mailadres wijzigen')
             ->type('test@test.nl', 'email')
             ->type('test2@test2.nl', 'email_confirmation')
             ->press('E-mailadres wijzigen')
             ->seePageIs('/account/email/edit')
             ->see('email bevestiging komt niet overeen.');
    }

    /**
     * Tests if the user can change his password
     *
     * @return void
     */
    public function testCanChangePassword()
    {
        $user = factory(App\User::class)->create([
            'password' => 'CurrentPassword123'
        ]);

        $this->actingAs($user)
             ->visit('/account/password/edit')
             ->see('Wachtwoord wijzigen')
             ->type('CurrentPassword123', 'password_current')
             ->type('NewPassword123', 'password')
             ->type('NewPassword123', 'password_confirmation')
             ->press('Wachtwoord wijzigen')
             ->seePageIs('/account')
             ->see('Uw wachtwoord is bijgewerkt.');
    }

    /**
     * Tests if the user can change his password with wrong current password
     *
     * @return void
     */
    public function testCantChangePasswordWithWrongCurrentPassword()
    {
        $user = factory(App\User::class)->create([
            'password' => 'CurrentPassword123'
        ]);

        $this->actingAs($user)
             ->visit('/account/password/edit')
             ->see('Wachtwoord wijzigen')
             ->type('WrongCurrentPassword123', 'password_current')
             ->type('NewPassword123', 'password')
             ->type('NewPassword123', 'password_confirmation')
             ->press('Wachtwoord wijzigen')
             ->seePageIs('/account/password/edit')
             ->see('huidige wachtwoord is onjuist.');
    }

    /**
     * Tests if the user can change his password with different new passwords
     *
     * @return void
     */
    public function testCantChangePasswordWithDifferentPasswords()
    {
        $user = factory(App\User::class)->create([
            'password' => 'CurrentPassword123'
        ]);

        $this->actingAs($user)
             ->visit('/account/password/edit')
             ->see('Wachtwoord wijzigen')
             ->type('CurrentPassword123', 'password_current')
             ->type('NewPassword123', 'password')
             ->type('WrongNewPassword123', 'password_confirmation')
             ->press('Wachtwoord wijzigen')
             ->seePageIs('/account/password/edit')
             ->see('password bevestiging komt niet overeen.');
    }

    /**
     * Tests if the user can reach the account page when not logged in
     *
     * @return void
     */
    public function testCantReachAccountIndexWhenNotLoggedIn()
    {
        $this->visit('/account')
             ->seePageIs('/login')
             ->see('Inloggen');
    }

    /**
     * Tests if the user can reach the password change page when not logged in
     *
     * @return void
     */
    public function testCantReachPasswordEditPageWhenNotLoggedIn()
    {
        $this->visit('/account/password/edit')
             ->seePageIs('/login')
             ->see('Inloggen');
    }

    /**
     * Tests if the user can reach the email address change page when not logged in
     *
     * @return void
     */
    public function testCantReachEmailEditPageWhenNotLoggedIn()
    {
        $this->visit('/account/email/edit')
             ->seePageIs('/login')
             ->see('Inloggen');
    }
}