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

require_once 'vendor/autoload.php';

use User\BeerWebsite\Router;
use User\BeerWebsite\Controller;

$router = new Router();

$router->fillGetArray('index', [Controller::class, 'index']);
$router->fillGetArray('/', [Controller::class, 'index']);
$router->fillPostArray('index', [Controller::class, 'index']);
$router->fillGetArray('/storedData', [Controller::class, 'storedData']);
$router->fillPostArray('/storedData', [Controller::class, 'storedData']);

$router->resolve();



