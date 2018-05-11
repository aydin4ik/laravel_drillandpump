<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

// Home > Login
Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});


// Home > Register
Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Register', route('register'));
});


// Home > Get Reset Link
Breadcrumbs::register('password.email', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Get Password Reset Link', route('password.email'));
});


// Home > Reset Password
Breadcrumbs::register('password.reset', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Reset Password', route('password.reset'));
});


// Manage > Dashboard
Breadcrumbs::register('manage', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Manage', route('manage'));
    // $breadcrumbs->push('Dashboard', route('manage.dashboard'));
});


Breadcrumbs::register('user', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('manage');
    $breadcrumbs->push($user->name, route('users', $user));
});