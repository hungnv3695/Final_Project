<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:26 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{

    private $roomTypeID;
    private $name;
    private $adult;
    private $children;
    private $price;
    private $description;

    /**
     * @return mixed
     */
    public function getRoomTypeID()
    {
        return $this->roomTypeID;
    }

    /**
     * @param mixed $roomTypeID
     */
    public function setRoomTypeID($roomTypeID)
    {
        $this->roomTypeID = $roomTypeID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAdult()
    {
        return $this->adult;
    }

    /**
     * @param mixed $adult
     */
    public function setAdult($adult)
    {
        $this->adult = $adult;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_room_type';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'room_type_id';

    /**
     * setting use increment number or not
     * @var bool
     */
    public $incrementing = false;

    /**
     * setting use timestamps or not
     * @var bool
     */
    public $timestamps = false;
}