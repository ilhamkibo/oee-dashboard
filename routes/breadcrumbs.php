<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('home'));
});

// Home > Blog
Breadcrumbs::for('performance', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Datalog / Performance ', route('performance'));
});

// Home > Blog
Breadcrumbs::for('quality', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Datalog / Quality ', route('quality'));
});

// Home > Blog
Breadcrumbs::for('availability', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Datalog / Availability ', route('availability'));
});