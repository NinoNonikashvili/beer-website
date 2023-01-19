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

 namespace User\BeerWebsite;

/**
 * Controller
 * 
 * @category Beer_Website
 * @package  Beer_Website
 * @author   Nino <nonikashvilinino8799@gmail.com>
 * @license  No license
 * @link     https://github.com/NinoNonikashvili/beer-website
 */

class Controller
{
    /**
     * Get/post requests on home page are handled by this function
     * 
     * @return void
     */
    public static function index()
    {
        echo 'index page is visited';
    }

    /**
     * Get/post requests on storedData page are handled by this function.
     * 
     * @return void
     */
    public static function storedData()
    {
        echo 'stored data page visited';
    }
}