<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://codegroup-54552efc0bf4.herokuapp.com/players/create',
        'http://codegroup-54552efc0bf4.herokuapp.com/players/edit/*',
        'http://codegroup-54552efc0bf4.herokuapp.com/players/delete/*',
        'http://codegroup-54552efc0bf4.herokuapp.com/players/store',
        'http://codegroup-54552efc0bf4.herokuapp.com/players/update/*',
        'http://codegroup-54552efc0bf4.herokuapp.com/players',
        'http://codegroup-54552efc0bf4.herokuapp.com/sort-teams'
    ];
}
