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

/**
 * Router
 * 
 * @category Beer_Website
 * @package  Beer_Website
 * @author   Nino <nonikashvilinino8799@gmail.com>
 * @license  No license
 * @link     https://github.com/NinoNonikashvili/beer-website
 */

class Router
{
    protected array $get_requests = [];
    protected array $post_requests = [];
    public ?Data $db = null;

    /**
     * Constructor for data instance
     * 
     * @param $db db instance
     */
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    /**
     * Populate array of get requests with urls and corresponding methods
     * from Controller class.
     *
     * @param $url url name, serves as a key in associative array
     * @param $fn  function from controller class, serves as value in assoc. array
     * 
     * @return void
     */
    public function fillGetArray($url, $fn) 
    {
        $this->get_requests[$url] = $fn;
    }

    /**
     * Populate array of post requests with urls and corresponding methods
     * from controller class
     * 
     * @param $url url name, serves as key in assoc. array
     * @param $fn  function from controller class, serves as a value in assoc. array
     * 
     * @return void
     */
    public function fillPostArray($url, $fn)
    {
        $this->post_requests[$url] = $fn;
    }

    /**
     * Detect current request method and url and call appropriate function 
     * using aboce described arrays.
     * 
     * @return void
     */
    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        //if url contains query parameters, take the endpoint only.
        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?')); 
        }
        if ($method === 'get') {
            $fn = $this->get_requests[$url];
        } else if ($method === 'post') {
            $fn = $this->post_requests[$url];
        }

        if ($fn === null) {
            echo 'page not found';
        } else {
            call_user_func($fn, $this);
        }
    }
    /**
     * Outputs appropriate view to the user.
     * 
     * @param $url name of the page to render
     * 
     * @return void
     */
    public function render($url, $suggestions = null, $beer = null, $error = null)
    {
        $errorToShow = $error;
        $beerToDisplay = $beer;
        $products = $suggestions;
        include __DIR__."/views/$url.php";
    }
}
