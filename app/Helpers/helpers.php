<?php

if (!function_exists('company_name')) {
    function company_name()
    {
        return auth()->user()?->company?->name ?? 'Default Company';
    }
}

if (!function_exists('is_admin')) {
    function is_admin()
    {
        return auth()->check() && auth()->user()->hasRole('Admin');
    }
}
