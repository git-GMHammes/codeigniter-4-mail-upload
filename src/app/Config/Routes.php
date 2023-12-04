<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('mail', function ($routes) {
    $routes->group('api', function ($routes) {
        $routes->get('send', 'MailApiController::mail');
        $routes->get('send/(:segment)', 'MailApiController::mail/$1');
        $routes->get('send/(:any)', 'MailApiController::mail/$1');
        $routes->post('send', 'MailApiController::mail');
        $routes->post('send/(:any)', 'MailApiController::mail/$1');
    });
    $routes->group('endpoint', function ($routes) {
    });
});
$routes->group('upload', function ($routes) {
    $routes->group('api', function ($routes) {
        $routes->get('send', 'UploadApiController::toExecute');
        $routes->get('send/(:segment)', 'UploadApiController::toExecute/$1');
        $routes->get('send/(:any)', 'UploadApiController::toExecute/$1');
        $routes->post('send', 'UploadApiController::toExecute');
        $routes->post('send/(:any)', 'UploadApiController::toExecute/$1');
    });
    $routes->group('endpoint', function ($routes) {
        $routes->get('send', 'UploadEndPointController::toExecute');
        $routes->get('send/(:segment)', 'UploadEndPointController::toExecute/$1');
        $routes->get('send/(:any)', 'UploadEndPointController::toExecute/$1');
        $routes->post('send', 'UploadEndPointController::toExecute');
        $routes->post('send/(:any)', 'UploadEndPointController::toExecute/$1');
    });
});
