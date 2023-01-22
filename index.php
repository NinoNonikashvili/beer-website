<?php
/**
 * PHP version 8.0
 * 
 * @category Beer_Website
 * @package  Beer_Website
 * @author   Nino <nonikashvilinino8799@gmail.com>
 * @license  No license
 * @link     https://github.com/NinoNonikashvili/beer-website
 */

// header('Access-Control-Allow-Origin: *');

require_once 'vendor/autoload.php';

use User\BeerWebsite\Router;
use User\BeerWebsite\Controller;
use User\BeerWebsite\model\Data;


$db = new Data();
$router = new Router($db);

$router->fillGetArray('/index', [Controller::class, 'index']);
$router->fillGetArray('/', [Controller::class, 'index']);
$router->fillPostArray('/index', [Controller::class, 'index']);
$router->fillPostArray('/search', [Controller::class, 'search']);
$router->fillGetArray('/beers', [Controller::class, 'beers']);
$router->fillPostArray('/beers', [Controller::class, 'beers']);
$router->fillGetArray('/contacts', [Controller::class, 'contacts']);
$router->fillPostArray('/contacts', [Controller::class, 'contacts']);

$router->resolve();



