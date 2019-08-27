<?php

namespace App\Http\Middleware\SoftEmp;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Locale;
use App;

class Language
 {

    private $locale;

    public function __construct(Locale $locale) {
        $this->locale = $locale;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::Check()) {
            $user = Auth::user();

            $locale = $this->locale->where(['countrie_language_id' => $user->profile->countrie_language_id])->get();
            App::setLocale($locale[0]['locale']);
        }

        return $next($request);
    }
}
