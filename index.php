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

$router->fillGetArray('index', [Controller::class, 'index']);
$router->fillGetArray('/', [Controller::class, 'index']);
$router->fillPostArray('index', [Controller::class, 'index']);
$router->fillGetArray('/search', [Controller::class, 'search']);
$router->fillGetArray('/storedData', [Controller::class, 'storedData']);
$router->fillPostArray('/storedData', [Controller::class, 'storedData']);

$router->resolve();



