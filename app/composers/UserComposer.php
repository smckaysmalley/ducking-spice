<?php

namespace composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserComposer
{
    function compose(View $view)
    {
        if(Auth::check()) {
        $view->with([
            'email'      => Auth::user()->email,
            'id'         => Auth::id(),
            'admin'      => Auth::user()->admin,
            'fname'      => Auth::user()->first_name,
            'lname'      => Auth::user()->last_name
        ]);

        }
    }
}