<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactControllerTest extends TestCase
{

    public function test_contact_page_returns_200(): void
    {
        $this->get('/contact')->assertStatus(200);
    }

    public function test_contact_page_shows_contact_sections(): void
    {
        $response = $this->get('/contact');
        $response->assertSee(__('messages.contact_whatsapp'), false);
        $response->assertSee(__('messages.contact_map_title'), false);
    }
}
