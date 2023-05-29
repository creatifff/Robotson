<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('page.login');
    }

//    public function account()
//    {
//        return view('pages.accountSettings.account');
//    }
//    public function accountAddresses()
//    {
//        return view('pages.accountSettings.accountAddresses');
//    }
//    public function accountOrders()
//    {
//        return view('pages.accountSettings.accountOrders');
//    }
}
