<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Herbs catalog is no longer part of the public frontend.
 * Backend models/seeders may remain for internal use.
 */
class HerbControllerTest extends TestCase
{
    public function test_herbs_routes_are_not_publicly_available(): void
    {
        $this->get('/herbs')->assertNotFound();
        $this->get('/herbs/example-slug')->assertNotFound();
    }
}
