<?php
/**
 * Created by IntelliJ IDEA.
 * User: RaHuL
 * Date: 2/26/2018
 * Time: 9:54 PM
 */

class User_info
{
    private $u_info_id;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $e_mail;
    private $contact_no;
    private $gender;
    private $date_of_birth;
//    private $image;
//    private $u_id;
//    private $nominee_id;
//    private $address_id;

    public function __construct($first_name, $middle_name, $last_name, $e_mail, $contact_no, $gender,$date_of_birth)
    {
        //$this->u_info_id = $u_info_id;
        $this->first_name = $first_name;
        $this->middle_name = $middle_name;
        $this->last_name = $last_name;
        $this->e_mail = $e_mail;
        $this->contact_no = $contact_no;
        $this->gender = $gender;
        $this->date_of_birth = $date_of_birth;
//        $this->image = $image;
//        $this->u_id = $u_id;
//        $this->nominee_id = $nominee_id;
//        $this->address_id = $address_id;
    }

    /**
     * @return mixed
     */
    public function getUInfoId()
    {
        return $this->u_info_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->e_mail;
    }

    /**
     * @return mixed
     */
    public function getContactNo()
    {
        return $this->contact_no;
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
     * @return mixed
     */
    public function getNomineeId()
    {
        return $this->nominee_id;
    }

    /**
     * @return mixed
     */
    public function getAddressId()
    {
        return $this->address_id;
    }

    /**
     * @param mixed $u_info_id
     */
    public function setUInfoId($u_info_id)
    {
        $this->u_info_id = $u_info_id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param mixed $middle_name
     */
    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param mixed $e_mail
     */
    public function setEMail($e_mail)
    {
        $this->e_mail = $e_mail;
    }

    /**
     * @param mixed $contact_no
     */
    public function setContactNo($contact_no)
    {
        $this->contact_no = $contact_no;
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

    /**
     * @param mixed $nominee_id
     */
    public function setNomineeId($nominee_id)
    {
        $this->nominee_id = $nominee_id;
    }

    /**
     * @param mixed $address_id
     */
    public function setAddressId($address_id)
    {
        $this->address_id = $address_id;
    }
}