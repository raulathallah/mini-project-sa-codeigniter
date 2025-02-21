<?php

use App\Controllers\Admin\Admin;
use App\Controllers\Auth;
use App\Controllers\Home;
use App\Controllers\Product;
use App\Controllers\User;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'login']);
$routes->get('/home', [Home::class, 'index']);

$routes->get('product', [Product::class, 'index']);
$routes->get('user-profile', [User::class, 'userProfile']);
$routes->post('login', [Auth::class, 'login']);
$routes->post('logout', [Auth::class, 'logout']);

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  //$routes->get('dashboard', [Dashboard::class, 'index'], ['filter'=>\App\Filters\AuthFilter::class]);  
  $routes->get('dashboard', [Admin::class, 'index']);
  $routes->get('user', [Admin::class, 'getUsers']);
});
