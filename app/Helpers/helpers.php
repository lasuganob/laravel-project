<?php

if(! function_exists('role_prefix')) {
    function role_prefix() {
        return auth()->user()->is_admin ? 'admin' : 'user';
    }
}
