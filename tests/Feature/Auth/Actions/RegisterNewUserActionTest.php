<?php

declare(strict_types=1);

namespace Tests\Feature\Auth\Actions;

use Domain\Auth\Contracts\RegisterNewUserContract;
use Domain\Auth\DTOs\NewUserDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class RegisterNewUserActionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_success_user_created(): void
    {
        $this->assertDatabaseMissing('users', [
            'email' => 'tayberi00@gmail.com'
        ]);

        $action = app(RegisterNewUserContract::class);

        $action(NewUserDTO::make('test', 'tayberi00@gmail.com', '1234567890'));

        $this->assertDatabaseHas('users', [
            'email' => 'tayberi00@gmail.com'
        ]);
    }
}
