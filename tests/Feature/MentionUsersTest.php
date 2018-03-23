<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function mentioned_users_in_a_comment_are_notified()
    {
        $Yoginth = create('App\User', ['username' => 'Yoginth']);

        $this->signInViaPassport($Yoginth);

        $Sivaramakrishnan = create('App\User', ['username' => 'Sivaramakrishnan']);

        $submission = create('App\Submission'); 

        $this->json('POST', '/api/comments', [
            'body' => 'Hello @Sivaramakrishnan Please take a look at this.', 
            'submission_id' => $submission->id 
        ])->assertStatus(201);

        $this->assertCount(1, $Sivaramakrishnan->notifications);
    }

    /** @test */
    public function no_notification_when_mentioning_self()
    {
        $john = create('App\User', ['username' => 'JohnDoe']);
        $this->signInViaPassport($john);
        $submission = create('App\Submission'); 
        $this->json('POST', '/api/comments', [
            'body' => 'This is @JohnDoe. Nice to meet you', 
            'submission_id' => $submission->id 
        ])->assertStatus(201);
        $this->assertCount(0, $john->notifications);
    }
}
