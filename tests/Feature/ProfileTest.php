<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function profile_page_displays_correct_info()
    {
        create('App\User', [
            'username' => 'YoginthS', 
            'name' => 'Yoginth', 
            'location' => 'World', 
            'info' => [
                'twitter' => 'yoginth_on_twitter', 
                'website' => 'https://yoginth.ml'
            ]
        ]);

        $this->get('/@' . 'YoginthS')
            ->assertSee('@' . 'YoginthS')
            ->assertSeeText('World')
            ->assertSee('yoginth_on_twitter')
            ->assertSee('votepen.com')
            ->assertSee('Yoginth');
    }
}
