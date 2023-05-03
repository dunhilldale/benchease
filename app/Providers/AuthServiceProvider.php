<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Users' => 'App\Policies\UsersPolicy',
        // 'App\Models\Skills' => 'App\Policies\SkillsPolicy',
        // 'App\Models\SkillSearches' => 'App\Policies\SkillSearchesPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Passport::tokensExpireIn(now()->addMinutes(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addDays(6));

        // Passport::tokensCan([
        //     'get-email' => 'Retrieve email address associated with your account',
        //     'get-user-info' => 'Retrieve information associated with your account',
        // ]);

        // Passport::setDefaultScope([
        //     'get-user-info' => 'Retrieve information associated with your account',
        // ]);
    }
}
