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
        'https://codegroup-54552efc0bf4.herokuapp.com/players/create',
        'https://codegroup-54552efc0bf4.herokuapp.com/players/edit/*',
        'https://codegroup-54552efc0bf4.herokuapp.com/players/delete/*',
        'https://codegroup-54552efc0bf4.herokuapp.com/players/store',
        'https://codegroup-54552efc0bf4.herokuapp.com/players/update/*',
        'https://codegroup-54552efc0bf4.herokuapp.com/players',
        'https://codegroup-54552efc0bf4.herokuapp.com/sort-teams',
        'https://codegroup-54552efc0bf4.herokuapp.com'
    ];
}
