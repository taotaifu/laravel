<?php

namespace App\Providers;

use App\Models\Comment;
use App\Observers\CommentObserver;
use App\Observers\ConfigObserver;
use App\Observers\UserObserver;
use App\User;
use Carbon\Carbon;
use App\Models\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {       //解决数据库版本低
		Schema::defaultStringLength(191);
		    //设置中文
		Carbon::setLocale ('zh');
		  //注册观察者
		User::observe (UserObserver::class);
		//注册消息通知的观察者
		Comment::observe (CommentObserver::class);
		//注册配置观察者
		Config::observe (ConfigObserver::class);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if ($this->app->environment() !== 'production') {
		$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
	 }
    }

}
