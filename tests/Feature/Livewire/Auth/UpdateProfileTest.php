<?php

namespace Tests\Feature\Livewire\Auth;

use App\Livewire\Auth\UpdateProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\User;
use PHPUnit\Framework\Attributes\Test;

class UpdateProfileTest extends TestCase
{

    use RefreshDatabase;

    #[Test]
    public function a_user_can_update_their_profile()
    {
        $user = $this->signIn();

        $this->actingAs($user)->get("/users/$user->id")->assertOk();

        Livewire::test(UpdateProfile::class)
        ->set('form.first_name', 'Jeff')
        ->set('form.last_name', 'Way')
        ->set('form.email', 'jefo@google.com')
        ->set('form.username', 'coolerance')
        ->call('save')
        ->assertDispatched('profile-updated');

        $this->assertDatabaseHas('users', [
            'first_name' => 'Jeff',
            'last_name' => 'Way',
            'email' => 'jefo@google.com'
        ]);
    }
}
