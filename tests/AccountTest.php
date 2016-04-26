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
     * Tests if the user can reach the account page when logged in
     *
     * @return void
     */
    public function testCantReachAccountIndexWhenNotLoggedIn()
    {
        $this->visit('/account')
             ->seePageIs('/login')
             ->see('Inloggen');
    }
}
