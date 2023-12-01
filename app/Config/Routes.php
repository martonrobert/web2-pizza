<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/**
 * Főoldal
 */
$routes->get('/', 'HomePageController::index');

/**
 * Egy konkrét pizza adatainak lekérdezése
 */
$routes->get('pizza/(:any)', 'PizzaController::getPizza/$1');

/**
 * Új pizza rendelés felület
 */
$routes->get('order-pizza/(:any)', 'OrderController::newOrder/$1');

/**
 * Pizza rendelés rögzítése
 */
$routes->post('orders', 'OrderController::setOrder');

/**
 * Rendelések listája
 */
$routes->get('orders', 'OrderController::getOrdersList');

/**
 * Rendelés kiszállítása
 */
$routes->post('orders/(:num)', 'OrderController::setOrderShipped/$1');


/**
 * Rólunk
 */
$routes->get('about', 'AboutController::index');

/**
 * Kapcsolat
 */
$routes->get('contact-us', 'ContactController::index');