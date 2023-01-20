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
 * Beer 
 * 
 * @category Beer_Website
 * @package  Beer_Website
 * @author   Nino <nonikashvilinino8799@gmail.com>
 * @license  No license
 * @link     https://github.com/NinoNonikashvili/beer-website
 */

class Beer
{
    protected string $name;
    protected string $first_brewed;
    protected string $description;
    protected array $food_pairing;

    /**
     * Constructor to initialize properties
     * 
     * @param $name         beer name
     * @param $first_brewed first brewed data
     * @param $description  history
     * @param $food_pairing foods that goes with it.
     * 
     * @return void
     */
    public function __construct($name, $description, $first_brewed, $food_pairing)
    {
        $this->name = $name;
        $this->first_brewed = $first_brewed;
        $this->description = $description;
        $this->food_pairing = $food_pairing;
    }
    /**
     * Getter for name
     * 
     * @return $name
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Getter for first_brewed
     * 
     * @return $first_brewed
     */
    public function getdate()
    {
        return $this->first_brewed;
    }

    /**
     * Getter for description
     * 
     * @return $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Getter for food_pairing
     * 
     * @return $food_pairing
     */
    public function getFood()
    {
        $foodsString = '';
        foreach ($this->food_pairing as $food) {
            $foodsString .= $food . '&';
        }
        return $foodsString;
    }

}