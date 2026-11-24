<?php

use App\Models\Profile;

if (! function_exists('profile')) {
    function profile(string $key, ?string $default = null): ?string
    {
        return Profile::val($key, $default);
    }
}
