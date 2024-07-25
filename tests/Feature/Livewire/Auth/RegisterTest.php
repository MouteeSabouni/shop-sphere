<?php

namespace Tests\Feature\Livewire\Auth;


use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use App\Livewire\Auth\Register;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    #[Test]
    public function renders_successfully()
    {
        Livewire::test(Register::class)
            ->assertStatus(200);
    }

    #[Test]
    public function guests_can_create_a_profile()
    {
        $attributes = [
            'form.first_name' => 'Jeff',
            'form.last_name' => 'Way',
            'form.email' => 'jeff@laracasts.com',
            'form.username' => 'jefferyway',
            'form.password' => 'password',
            'form.password_confirmation' => 'password',
            'tos' => true
        ];

        Livewire::test(Register::class)
            ->set($attributes)
            ->call('save');

        $this->assertDatabaseHas('users', [
            'first_name' => $attributes['form.first_name'],
            'last_name' => $attributes['form.last_name'],
            'email' => $attributes['form.email'],
            'username' => $attributes['form.username'],
        ]);
    }

    #[Test]
    public function email_and_username_are_required()
    {
        $attributes = [
            'form.first_name' => 'Jeff',
            'form.last_name' => 'Way',
            'form.email' => null,
            'form.username' => null,
            'form.password' => 'password',
            'form.password_confirmation' => 'password',
            'tos' => true
        ];

        Livewire::test(Register::class)
            ->set($attributes)
            ->call('save')
            ->assertHasErrors([
                'form.email' => 'You need an email to register',
                'form.username' => 'You need a username to register'
            ]);

            $this->assertDatabaseMissing('users', [
                'first_name' => $attributes['form.first_name'],
                'last_name' => $attributes['form.last_name'],
            ]);
        }

        #[Test]
        public function agreeing_to_tos_is_required()
        {
            $attributes = [
                'form.first_name' => 'Jeff',
                'form.last_name' => 'Way',
                'form.email' => 'jeff@laracasts.com',
                'form.username' => 'jefferyway',
                'form.password' => 'password',
                'form.password_confirmation' => 'password',
                'tos' => false
            ];

            Livewire::test(Register::class)
            ->set($attributes)
            ->call('save');

            $this->assertDatabaseMissing('users', [
                'first_name' => $attributes['form.first_name'],
                'last_name' => $attributes['form.last_name'],
        ]);
    }
}
