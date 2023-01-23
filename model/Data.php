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

 namespace User\BeerWebsite\model;
/**
 * Router
 * 
 * @category Beer_Website
 * @package  Beer_Website
 * @author   Nino <nonikashvilinino8799@gmail.com>
 * @license  No license
 * @link     https://github.com/NinoNonikashvili/beer-website
 */

class Data
{
    protected $pdo = null;

    /**
     * Constructor for pdo object
     */
    public function __construct()
    {
        $this->pdo = new \PDO('mysql:host=localhost;  port = 3306; dbname=products_crud', 'root', '');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }

    /**
     * Fetch data from beer API
     * 
     * @param $keyword beer to search
     * 
     * @return $data either error messsage (string) if error occured or array of data
     *               if fetched successfully                
     */
    public function fetchData($keyword = null)
    {
        $curl = $keyword ? curl_init('https://api.punkapi.com/v2/beers?'.$keyword) 
                         : curl_init('https://api.punkapi.com/v2/beers');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = !curl_error($curl) ? json_decode($data) : curl_error($curl);
        return $data;
    }

    /**
     * Save data on DB
     * 
     * @param $beer beer to search
     * 
     * @return $status status code
     */
    public function saveOnDB(Beer $beer)
    {
        //IGNORE ensures that there wont be duplicate rows for similar beers.
        $statement = $this->pdo->prepare('INSERT IGNORE INTO beers(name, img, first_brewed, description, food_pairing) VALUES(:name, :img, :first_brewed, :description, :food_pairing)');
        $statement->bindValue(':name', $beer->getname());
        $statement->bindValue(':img', $beer->getImg());
        $statement->bindValue(':first_brewed', $beer->getdate());
        $statement->bindValue(':description', $beer->getDescription());
        $statement->bindValue(':food_pairing', $beer->getFood());
        $statement->execute();

    }

    /**
     * Get data from DB
     * 
     * @param $keyword beer to return
     * 
     * @return array $data
     */
    public function getFromDB($keyword = '')
    {
        if ($keyword !== '') {
            $statement = $this->pdo->prepare('SELECT *FROM beers WHERE name like :keyword');
            $statement->bindValue(':keyword', "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT *FROM beers');
        }

        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Formats data in json to beer object
     * 
     * @param $jsonObj takes json object
     * 
     * @return Beer $beer
     */
    public function jsonToBeerObj($jsonObj)
    {
        return new Beer($jsonObj->name, $jsonObj->image_url, $jsonObj->description, $jsonObj->first_brewed, $jsonObj->food_pairing);
    }
}