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

use function PHPSTORM_META\type;

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
        // echo 'index page is visited with get request';
        // echo '<br>';
        $router->render('index');
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
        // echo 'search process started';
        $keyword = $_POST['keyword'] ?? null;
        $clicked = $_POST['clicked'] ?? null;
        // echo "this was entered: ";
        // var_dump($keyword);
        // echo "this was clicked: ";
        // var_dump($clicked);
        if ($keyword !== null) {
            if ($keyword === '') {
                header('Location: /');
            }
            $data = $router->db->fetchData('beer_name='.$keyword);
            if (gettype($data) === 'string') {
                //error occured
                $router->render('index', null, null, $data);
            } else if (empty($data)) {
                //beer was not found
                $router->render('index', null, null, 'Beer Not Found');
            } else {
                $router->render('index', $data);
            }
            //$router->render(); //display names of beers in dropdwon or error
        } else if ($clicked !== null) {
            $data = $router->db->fetchData('beer_name='.$clicked);
            if (gettype($data) === 'string') {
                //error occured
                $router->render('index', null, null, $data);
            } else if (empty($data)) {
                //beer was not found
                $router->render('index', null, null, 'Beer Not Found');
            } else {
                //format as beer object
                $beer = $router->db->jsonToBeerObj($data[0]);
                //save on db
                $router->db->saveOnDB($beer);
                //get from db using name stored in $clicked
                $beerToRender = $router->db->getFromDB($clicked);
                // //pass to render
                // echo '<pre>';
                // var_dump($beerToRender); 
                // echo '</pre>';

                $router->render('index', null, $beerToRender);
            }
            
        }
      
    }

    /**
     * Get/post requests on beers page are handled by this function.
     * 
     * @param Router $router router instance to access data instance
     * 
     * @return void
     */
    public static function beers(Router $router)
    {
        // echo 'stored data page visited';
        $router->render('beers');
    }
    /**
     * Get/post requests on contacts page are handled by this function.
     * 
     * @param Router $router router instance to access data instance
     * 
     * @return void
     */
    public static function contacts(Router $router)
    {
        // echo 'contacts data page visited';
        $router->render('contacts');
    }
}