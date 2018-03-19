<?php
/**
 * Created by IntelliJ IDEA.
 * User: RaHuL
 * Date: 2/26/2018
 * Time: 10:40 PM
 */

class Address
{
   // private $address_id;
    private $address;
    private $type;
    private $state;
    private $city;
    private $country;
    private $zip_code;
    //private $u_id;

    public function __construct($address,$type,$state,$city,$country,$zip_code)
    {
        //$this->address_id=$address_id;
        $this->address=$address;
        $this->type=$type;
        $this->state=$state;
        $this->city=$city;
        $this->country=$country;
        $this->zip_code=$zip_code;
        //$this->u_id=$u_id;
    }

    /**
     * @return mixed
     */
    public function getAddressId()
    {
        return $this->address_id;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @return mixed
     */
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddressId($address_id)
    {
        $this->address_id = $address_id;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param mixed $zip_code
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
    }

    /**
     * @param mixed $u_id
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;
    }

}