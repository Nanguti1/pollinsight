<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_about_and_contacts_pages_are_accessible()
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee("A centralized platform for tracking aspirants and public opinion across Kenya's 47 counties.");

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Who we are');

        $this->get(route('contacts'))
            ->assertOk()
            ->assertSee('Get in touch');
    }
}
