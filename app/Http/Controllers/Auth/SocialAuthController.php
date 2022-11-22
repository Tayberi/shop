<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Domain\Auth\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $driver): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)
            ->redirect();
    }

    public function callback(string $driver): RedirectResponse
    {
        $githubUser = Socialite::driver($driver)->user();

        $user = User::query()->updateOrCreate([
            $driver.'_id' => $githubUser->id,
        ], [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password' => bcrypt(str()->random(20))
        ]);

        auth()->login($user);

        return redirect()
            ->intended(route('home'));
    }
}
