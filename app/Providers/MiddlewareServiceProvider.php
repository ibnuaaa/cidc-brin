<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MiddlewareServiceProvider extends ServiceProvider
{
    protected $middleware = [
        \Barryvdh\Cors\HandleCors::class
    ];

    protected $routeMiddleware = [
        // Web Middleware
        'cookies.encrypt' => \App\Http\Middleware\EncryptCookies::class,
        'auth.web' => \App\Http\Middleware\AuthenticateForWeb::class,
        'subtitue.bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'throttle' => \App\Http\Middleware\ThrottleRequests::class,

        'auth.api' => \App\Http\Middleware\Authenticate::class,
        'auth.cms' => \App\Http\Middleware\CMS\Authenticate::class,
        'cors' => \Barryvdh\Cors\HandleCors::class,
        'landing' => \App\Http\Middleware\Landing::class,
        'ArrQuery' => \App\Http\Middleware\QueryRoute::class,
        'AuthenticatePage' => \App\Http\Middleware\AuthenticatePage::class,

        'Authentication.Login' => \App\Http\Middleware\Authentication\Login::class,

        'Account.SignUp' => \App\Http\Middleware\Account\SignUp::class,

        'Account.SignUp' => \App\Http\Middleware\Account\SignUp::class,

        'User.Insert' => \App\Http\Middleware\User\Insert::class,
        'User.InsertMember' => \App\Http\Middleware\User\InsertMember::class,
        'User.Update' => \App\Http\Middleware\User\Update::class,
        'User.UpdateAdmin' => \App\Http\Middleware\User\UpdateAdmin::class,
        'User.UpdateMember' => \App\Http\Middleware\User\UpdateMember::class,
        'User.ChangePassword' => \App\Http\Middleware\User\ChangePassword::class,
        'User.ResetPassword' => \App\Http\Middleware\User\ResetPassword::class,
        'User.ChangeStatus' => \App\Http\Middleware\User\ChangeStatus::class,
        'User.Password' => \App\Http\Middleware\User\Password::class,
        'User.Delete' => \App\Http\Middleware\User\Delete::class,

        'Config.Insert' => \App\Http\Middleware\Config\Insert::class,
        'Config.Update' => \App\Http\Middleware\Config\Update::class,
        'Config.Delete' => \App\Http\Middleware\Config\Delete::class,


        'Position.Insert' => \App\Http\Middleware\Position\Insert::class,
        'Position.Update' => \App\Http\Middleware\Position\Update::class,
        'Position.Delete' => \App\Http\Middleware\Position\Delete::class,
        'Position.ChangeStatus' => \App\Http\Middleware\Position\ChangeStatus::class,

        'User.Developer.Token' => \App\Http\Middleware\User\Developer\Token::class,

        'LogActivity' => \App\Http\Middleware\LogActivity::class,

        'File.Upload' => \App\Http\Middleware\Upload\File::class,

        'Storage.Save' => \App\Http\Middleware\Storage\Save::class,
        'Storage.SaveExcel' => \App\Http\Middleware\Storage\SaveExcel::class,
        'Storage.Fetch' => \App\Http\Middleware\Storage\Fetch::class,
        'Storage.FetchTmp' => \App\Http\Middleware\Storage\FetchTmp::class,
        'Storage.Delete' => \App\Http\Middleware\Storage\Delete::class,
        'Storage.FetchThumb' => \App\Http\Middleware\Storage\FetchThumb::class,

        'PushNotification.Insert' => \App\Http\Middleware\PushNotification\Insert::class,

    ];

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->middleware($this->middleware);
        $this->app->routeMiddleware($this->routeMiddleware);
    }
}
