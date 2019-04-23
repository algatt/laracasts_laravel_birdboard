<?php

namespace Tests\Feature;

use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_project_can_invite_a_user()
    {
        $project = ProjectFactory::create();   

        $project->invite($newUser = factory(\App\User::class)->create());

        $this->signIn($newUser);
        $this->post(action('ProjectsTasksController@store', $project), $task = ['body' => 'Foo task']);

        $this->assertDatabaseHas('tasks', $task);
    }

}
