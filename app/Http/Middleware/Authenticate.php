<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
   protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        if ($request->is('student/*')) {
            return route('login.show', ['type' => 'student']);
        }
        if ($request->is('teacher/*')) {
            return route('login.show', ['type' => 'teacher']);
        }
        if ($request->is('parent/*')) {
            return route('login.show', ['type' => 'parent']);
        }
        return route('login.show', ['type' => 'admin']);
    }
}

}
