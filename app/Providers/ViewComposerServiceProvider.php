<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'layouts.admin.sidebar'
            ],
            'App\Http\ViewComposers\Admin\SidebarComposer'
        );

        view()->composer(
            [
                'layouts.admin.header'
            ],
            'App\Http\ViewComposers\Admin\HeaderComposer'
        );

        view()->composer(
            [
                'layouts.agent.sidebar'
            ],
            'App\Http\ViewComposers\Agent\SidebarComposer'
        );

        view()->composer(
            [
                'layouts.agent.header'
            ],
            'App\Http\ViewComposers\Agent\HeaderComposer'
        );

        view()->composer(
            [
                'layouts.header'
            ],
            'App\Http\ViewComposers\HeaderComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
