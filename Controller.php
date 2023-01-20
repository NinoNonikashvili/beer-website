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
 use User\BeerWebsite\model\Data;
 use User\BeerWebsite\Router;

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
     * Get requests on home page are handled by this function
     * 
     * @param Router $router router instance to access data instance
     * 
     * @return void
     */
    public static function index(Router $router)
    {
        echo 'index page is visited with get request';
        //$router->render();
    }

    /**
     * Get requests on home page in two cases:
     * 1. user entered keyword -> multiple appropriate data is returne
     *    and rendered in dropdown below search input. ?keyword from url
     * 2. user clicked desired data -> corresponding data details are
     *    rendered on the page. ?clicked from url
     * 
     * @param Router $router router instance to access data instance
     * 
     * @return void
     */
    public static function search(Router $router)
    {
        echo 'search process started';
        $keyword = $_GET['keyword'] ?? null;
        $clicked = $_GET['clicked'] ?? null;
        if ($keyword) {
            $data = $router->db->fetchData('beer_name='.$keyword);
            //$router->render(); //display names of beers in dropdwon or error
        } else if ($clicked) {
            $data = $router->db->fetchData('beer_name='.$clicked);
            //format as beer object
            $beer = $router->db->jsonToBeerObj($data[0]);
            //save on db
            $router->db->saveOnDB($beer);
            //get from db using name stored in $clicked
            $beerToRender = $router->db->getFromDB($clicked);
            //pass to render
            echo '<pre>';
            var_dump($beerToRender); 
            echo '</pre>';

            //$router->render();
        }
      
    }

    /**
     * Get/post requests on storedData page are handled by this function.
     * 
     * @param Router $router router instance to access data instance
     * 
     * @return void
     */
    public static function storedData(Router $router)
    {
        echo 'stored data page visited';
    }
}