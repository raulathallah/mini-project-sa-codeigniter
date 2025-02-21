<?php

use App\Controllers\Admin\Admin;
use App\Controllers\Home;
use App\Controllers\Product;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);

$routes->get('product', [Product::class, 'index']);
$routes->get('user-profile', [User::class, 'userProfile']);
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  //$routes->get('dashboard', [Dashboard::class, 'index'], ['filter'=>\App\Filters\AuthFilter::class]);  
  $routes->get('dashboard', [Admin::class, 'index']);
});
