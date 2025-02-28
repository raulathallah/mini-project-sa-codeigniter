<?php

use App\Controllers\Admin\Admin;
use App\Controllers\Admin\Product as AdminProduct;
use App\Controllers\Admin\User as AdminUser;
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

$routes->get('user-profile/(:any)', [User::class, 'userProfile']);
$routes->post('login', [Auth::class, 'login']);
$routes->post('logout', [Auth::class, 'logout']);

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
  //$routes->get('dashboard', [Dashboard::class, 'index'], ['filter'=>\App\Filters\AuthFilter::class]);  

  $routes->get('dashboard', [Admin::class, 'index']);


  //product
  $routes->get('product', [AdminProduct::class, 'index']);
  $routes->get('product/on_create', [AdminProduct::class, 'onCreate']);
  $routes->post('product/create', [AdminProduct::class, 'create']);
  $routes->get('product/on_update/(:num)', [AdminProduct::class, 'onUpdate']);
  $routes->post('product/update', [AdminProduct::class, 'update']);
  $routes->get('product/delete/(:num)', [AdminProduct::class, 'delete']);
  $routes->get('product/detail/(:num)', [AdminProduct::class, 'detail']);

  //user
  $routes->get('user', [Admin::class, 'getUsers']);
  $routes->get('user/on_create', [AdminUser::class, 'onCreate']);
  $routes->post('user/create', [AdminUser::class, 'create']);
  $routes->get('user/on_update/(:num)', [AdminUser::class, 'onUpdate']);
  $routes->post('user/update', [AdminUser::class, 'update']);
  $routes->get('user/delete/(:num)', [AdminUser::class, 'delete']);
  $routes->get('user/detail/(:num)', [AdminUser::class, 'detail']);
});
