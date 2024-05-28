<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Restaurant::class => 'App\Http\Sections\Restuarant',
        \App\Cart::class => 'App\Http\Sections\Carts',
        //\App\User::class => 'App\Http\Sections\Users',
        \App\Contacts::class => 'App\Http\Sections\Contacts',
        \App\Description::class => 'App\Http\Sections\Description',
        \App\Dessert::class => 'App\Http\Sections\Dessert',
        \App\MainSettings::class => 'App\Http\Sections\MainSettings',
        \App\Order::class => 'App\Http\Sections\Order',
        \App\Pinza::class => 'App\Http\Sections\Pinza',
        \App\Salat::class => 'App\Http\Sections\Salat',
        \App\Slider::class => 'App\Http\Sections\Slider',
        \App\Soup::class => 'App\Http\Sections\Soup',
        \App\Subscription::class => 'App\Http\Sections\Subscription',
        \App\Codes::class => 'App\Http\Sections\Codes',
        \App\User::class => 'App\Http\Sections\User',
        \App\Sets::class => 'App\Http\Sections\Sets',
        \App\Pasta::class => 'App\Http\Sections\Pasta',
        \App\Hot::class => 'App\Http\Sections\Hot',
        \App\Makaron::class => 'App\Http\Sections\Makaron',
    ];

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
