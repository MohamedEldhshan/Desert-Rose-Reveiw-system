<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocaleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_switch_to_english(): void
    {
        $response = $this->get('/lang/en');
        $response->assertRedirect();
        $this->assertEquals('en', session('locale'));
    }

    public function test_can_switch_to_arabic(): void
    {
        $response = $this->get('/lang/ar');
        $response->assertRedirect();
        $this->assertEquals('ar', session('locale'));
    }

    public function test_can_switch_to_russian(): void
    {
        $response = $this->get('/lang/ru');
        $response->assertRedirect();
        $this->assertEquals('ru', session('locale'));
    }

    public function test_can_switch_to_ukrainian(): void
    {
        $response = $this->get('/lang/uk');
        $response->assertRedirect();
        $this->assertEquals('uk', session('locale'));
    }

    public function test_can_switch_to_french(): void
    {
        $response = $this->get('/lang/fr');
        $response->assertRedirect();
        $this->assertEquals('fr', session('locale'));
    }

    public function test_can_switch_to_german(): void
    {
        $response = $this->get('/lang/de');
        $response->assertRedirect();
        $this->assertEquals('de', session('locale'));
    }

    public function test_unsupported_locale_is_ignored(): void
    {
        // Set a known locale first
        $this->withSession(['locale' => 'en']);

        $response = $this->get('/lang/xx');
        $response->assertRedirect();

        // Session locale should remain unchanged
        $this->assertEquals('en', session('locale'));
    }

    public function test_unsupported_locale_does_not_set_session(): void
    {
        $response = $this->get('/lang/es'); // Spanish not supported
        $response->assertRedirect();
        $this->assertNotEquals('es', session('locale'));
    }

    public function test_locale_switch_redirects_back(): void
    {
        $response = $this->from('/')->get('/lang/ar');
        $response->assertRedirect('/');
    }

    public function test_set_locale_middleware_applies_locale_from_session(): void
    {
        $response = $this->withSession(['locale' => 'ar'])->get('/');
        $response->assertStatus(200);
    }
}
