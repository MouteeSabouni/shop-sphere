<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\User;

abstract class TestCase extends BaseTestCase
{
    public function signIn($user = null)
    {
        $user = $user ?? User::factory()->create();
        $this->actingAs($user);

        return $user;
    }
}
