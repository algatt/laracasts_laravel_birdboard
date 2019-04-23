<?php

namespace Tests\Unit;

use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
	function it_has_a_user()
    {
    	$user = $this->signIn();
    	$project = ProjectFactory::ownedby($user)->create();
    	$this->assertEquals($user->id, $project->activity->first()->user->id);
    }
}
