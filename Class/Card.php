<?php
/**
 * Created by IntelliJ IDEA.
 * User: RaHuL
 * Date: 2/26/2018
 * Time: 11:27 PM
 */

class Card
{
    private $card_id;
    private $card_no;
    private $balance;
    private $card_pin;
    private $expire_date;
    private $c_v_s_code;
    private $c_date;
    private $u_id;

    public function __construct($card_id,$card_no,$balance,$card_pin,$expire_date,$c_v_s_code,$c_date,$u_id)
    {
        $this->card_id=$card_id;
        $this->card_no=$card_no;
        $this->balance=$balance;
        $this->card_pin=$card_pin;
        $this->expire_date=$expire_date;
        $this->c_v_s_code=$c_v_s_code;
        $this->c_date=$c_date;
        $this->u_id=$u_id;
    }

    /**
     * @return mixed
     */
    public function getCardId()
    {
        return $this->card_id;
    }

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->card_no;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @return mixed
     */
    public function getCardPin()
    {
        return $this->card_pin;
    }

    /**
     * @return mixed
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * @return mixed
     */
    public function getCVSCode()
    {
        return $this->c_v_s_code;
    }

    /**
     * @return mixed
     */
    public function getCDate()
    {
        return $this->c_date;
    }

    /**
     * @return mixed
     */
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $card_id
     */
    public function setCardId($card_id)
    {
        $this->card_id = $card_id;
    }

    /**
     * @param mixed $card_no
     */
    public function setCardNo($card_no)
    {
        $this->card_no = $card_no;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @param mixed $card_pin
     */
    public function setCardPin($card_pin)
    {
        $this->card_pin = $card_pin;
    }

    /**
     * @param mixed $expire_date
     */
    public function setExpireDate($expire_date)
    {
        $this->expire_date = $expire_date;
    }

    /**
     * @param mixed $c_v_s_code
     */
    public function setCVSCode($c_v_s_code)
    {
        $this->c_v_s_code = $c_v_s_code;
    }

    /**
     * @param mixed $c_date
     */
    public function setCDate($c_date)
    {
        $this->c_date = $c_date;
    }

    /**
     * @param mixed $u_id
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;
    }

}