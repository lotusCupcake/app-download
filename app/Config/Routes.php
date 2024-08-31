<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

if (file_exists(ROOTPATH . 'modules')) {
    $modulesPath = ROOTPATH . 'modules/';
    $modules = scandir($modulesPath);

    foreach ($modules as $module) {
        if ($module === '.' || $module === '..') continue;
        if (is_dir($modulesPath) . '/' . $module) {
            $routesPath = $modulesPath . $module . '/Config/Routes.php';
            if (file_exists($routesPath)) {
                require($routesPath);
            } else {
                continue;
            }
        }
    }
}
