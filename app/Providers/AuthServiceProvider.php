<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Answer' => 'App\Policies\AnswerPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
        'App\Models\File' => 'App\Policies\FilePolicy',
        'App\Models\Interest' => 'App\Policies\InterestPolicy',
        'App\Models\Quiz' => 'App\Policies\QuizPolicy',
        'App\Models\Question' => 'App\Policies\QuestionPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//
//        if (!$this->app->routesAreCached()) {
//            Passport::routes();
//        }
    }
}
