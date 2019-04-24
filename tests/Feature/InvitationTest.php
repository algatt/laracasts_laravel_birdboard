<?php

namespace Tests\Feature;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function non_owners_cannot_invite_a_user()
    {
        $project = ProjectFactory::create();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post($project->path().'/invitations')
            ->assertStatus(403);

        $project->invite($user);

        $this->actingAs($user)
            ->post($project->path().'/invitations')
            ->assertStatus(403);

    }

    /** @test */
    function a_project_owner_can_invite_a_user()
    {
        $project = ProjectFactory::create();   

        $userToInvite = factory(User::class)->create();

        $this->actingAs($project->owner)
            ->post($project->path().'/invitations',[
                'email' => $userToInvite->email
            ])
            ->assertRedirect($project->path());

        $this->assertTrue($project->members->contains($userToInvite));

    }

    /** @test */
    function the_email_address_must_be_associated_with_a_valid_birdboard_account()
    {
        
        $project = ProjectFactory::create();   

        $this->actingAs($project->owner)
            ->post($project->path().'/invitations',[
                'email' => 'notauser@example.com'
            ])
            ->assertSessionHasErrors([
                'email' => 'The user you are inviting must have a BirdBoard account.'
            ], null, 'invitations');
    }

    /** @test */
    function invited_users_may_update_project_details()
    {
        $project = ProjectFactory::create();   

        $project->invite($newUser = factory(\App\User::class)->create());

        $this->signIn($newUser);
        $this->post(action('ProjectsTasksController@store', $project), $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }

}
