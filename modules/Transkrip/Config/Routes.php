<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('transkrip', ['namespace' => 'Modules\Transkrip\Controllers'], function ($routes) {
    $routes->get('download', 'Transkrip::download');
});
