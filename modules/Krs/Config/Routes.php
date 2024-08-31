<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('krs', ['namespace' => 'Modules\Krs\Controllers'], function ($routes) {
    $routes->get('download', 'Krs::download');
});
