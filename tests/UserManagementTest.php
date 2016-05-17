<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserManagementTest extends TestCase
{
    /**
     * Tests if an normal user can reach the user management index.
     *
     * @return void
     */
    public function testUserIndexAsNormalUser()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
             ->visit('/')
             ->visit('/user')
             ->see('Welkom')
             ->seePageIs('/');
    }

    /**
     * Tests if an admin can reach the user management index.
     *
     * @return void
     */
    public function testUserIndexAsAdmin()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user')
             ->see('Gebruikers');
    }

    /**
     * Tests if an admin can't deactivate his own account.
     *
     * @return void
     */
    public function testAdminCantDeactivateHisOwnAccount()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $admin->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('0', 'activated')
             ->press('Gebruiker wijzigen')
             ->see('het is niet toegestaan jezelf te deactiveren.')
             ->dontSee('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $admin->id . '/edit')
             ->notSeeInDatabase('users', ['id' => $admin->id, 'activated' => 0]);
    }

    /**
     * Tests if an admin can't change the role of his own account.
     *
     * @return void
     */
    public function testAdminCantChangeRoleOfHisOwnAccount()
    {
        $this->seed('TestingDatabaseSeeder');
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $admin->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('retailer', 'user_role')
             ->press('Gebruiker wijzigen')
             ->see('het is niet toegestaan om je eigen rol te wijzigen.')
             ->dontSee('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $admin->id . '/edit')
             ->notSeeInDatabase('users', ['id' => $admin->id, 'user_role' => 'user']);
    }

    /**
     * Tests if an admin can change the name of a user.
     *
     * @return void
     */
    public function testAdminCanChangeUserName()
    {
        $this->seed('TestingDatabaseSeeder');
        $user = factory(App\User::class)->create([
            'name' => 'Oude Naam'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->type('Nieuwe Naam', 'name')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'name' => 'Nieuwe Naam'])
             ->dontSeeInDatabase('users', ['id' => $user->id, 'name' => 'Oude Naam']);
    }

    /**
     * Tests if an admin can change the email of a user.
     *
     * @return void
     */
    public function testAdminCanChangeUserEmail()
    {
        $this->seed('TestingDatabaseSeeder');
        //$this->expectsEvents('');
        $user = factory(App\User::class)->create([
            'email' => 'oud123@test.nl'
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->type('nieuw123@test.nl', 'email')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'email' => 'nieuw123@test.nl'])
             ->dontSeeInDatabase('users', ['id' => $user->id, 'email' => 'oud123@test.nl']);
    }

    /**
     * Tests if an admin can deactivate an user via the edit view.
     *
     * @return void
     */
    public function testAdminCanDeactivateUseViaEditView()
    {
        $this->seed('TestingDatabaseSeeder');
        $user = factory(App\User::class)->create();
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('0', 'activated')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'activated' => '0'])
             ->dontSeeInDatabase('users', ['id' => $user->id, 'activated' => '1']);
    }

    /**
     * Tests if an admin can activate an user via the edit view.
     *
     * @return void
     */
    public function testAdminCanActivateUseViaEditView()
    {
        $this->seed('TestingDatabaseSeeder');
        $user = factory(App\User::class)->create([
            'activated' => 0
        ]);
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('1', 'activated')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'activated' => '1'])
             ->dontSeeInDatabase('users', ['id' => $user->id, 'activated' => '0']);
    }

    /**
     * Tests if an admin can change the retailer of a user.
     *
     * @return void
     */
    public function testAdminCanChangeUserRetailer()
    {
        $this->seed('TestingDatabaseSeeder');
        $retailer = factory(App\Retailer::class)->create();
        $user = factory(App\User::class, 'retailer')->create();
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select($retailer->id, 'retailer_id')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'retailer_id' => $retailer->id]);
    }

    /**
     * Tests if an admin can change the role of a user to admin.
     *
     * @return void
     */
    public function testAdminCanChangeUserRoleToAdmin()
    {
        $this->seed('TestingDatabaseSeeder');
        $user = factory(App\User::class)->create();
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('admin', 'user_role')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'user_role' => 'admin']);
    }

    /**
     * Tests if an admin can change the role of a user to user.
     *
     * @return void
     */
    public function testAdminCanChangeUserRoleToUser()
    {
        $this->seed('TestingDatabaseSeeder');
        $user = factory(App\User::class)->create();
        $admin = factory(App\User::class, 'admin')->create();

        $this->actingAs($admin)
             ->visit('/user/' . $user->id . '/edit')
             ->see('Wijzig gebruiker')
             ->select('user', 'user_role')
             ->press('Gebruiker wijzigen')
             ->see('Gebruiker bijgewerkt.')
             ->seePageIs('/user/' . $user->id . '/edit')
             ->seeInDatabase('users', ['id' => $user->id, 'user_role' => 'user']);
    }

}
