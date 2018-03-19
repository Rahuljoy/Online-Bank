<?php
/**
 * Created by IntelliJ IDEA.
 * User: RaHuL
 * Date: 2/28/2018
 * Time: 1:22 PM
 */

class Type
{
    private $type_id;
    private $type;

    public function __construct($type_id,$type)
    {
        $this->type_id=$type_id;
        $this->type=$type;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type_id
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

}