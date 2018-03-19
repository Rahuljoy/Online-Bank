<?php
/**
 * Created by IntelliJ IDEA.
 * User: RaHuL
 * Date: 2/26/2018
 * Time: 11:03 PM
 */

class Nominee
{
    private $nominee_id;
    private $full_name;
    private $occupation;
    private $relationship;
    private $office_address;
    private $present_address;
    private $permanent_address;
    private $gender;
    private $date_of_birth;
   // private $image;
    //private $u_id;

    public function __construct($full_name,$occupation,$relationship,$office_address,$present_address,$permanent_address,$gender,$date_of_birth)
    {
       // $this->nominee_id=$nominee_id;
        $this->full_name=$full_name;
        $this->occupation=$occupation;
        $this->relationship=$relationship;
        $this->office_address=$office_address;
        $this->present_address=$present_address;
        $this->permanent_address=$permanent_address;
        $this->gender=$gender;
        $this->date_of_birth=$date_of_birth;
        //$this->image=$image;
        //$this->u_id=$u_id;
    }

    /**
     * @return mixed
     */
    public function getNomineeId()
    {
        return $this->nominee_id;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @return mixed
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @return mixed
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * @return mixed
     */
    public function getOfficeAddress()
    {
        return $this->office_address;
    }

    /**
     * @return mixed
     */
    public function getPresentAddress()
    {
        return $this->present_address;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddress()
    {
        return $this->permanent_address;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $nominee_id
     */
    public function setNomineeId($nominee_id)
    {
        $this->nominee_id = $nominee_id;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @param mixed $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @param mixed $relationship
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    }

    /**
     * @param mixed $office_address
     */
    public function setOfficeAddress($office_address)
    {
        $this->office_address = $office_address;
    }

    /**
     * @param mixed $present_address
     */
    public function setPresentAddress($present_address)
    {
        $this->present_address = $present_address;
    }

    /**
     * @param mixed $permanent_address
     */
    public function setPermanentAddress($permanent_address)
    {
        $this->permanent_address = $permanent_address;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param mixed $u_id
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;
    }

}