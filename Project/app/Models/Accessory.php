<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/11/2017
 * Time: 9:26 PM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Accessory extends Model
{

    private $room_id;
    private $accessory_name;
    private $quantity;
    private $price;
    private $description;
    private $accessory_list = array();

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }


    /**
     * @return array
     */
    public function getAccessoryList()
    {
        return $this->accessory_list;
    }

    /**
     * @param array $accessory_list
     */
    public function setAccessoryList($accessory_list)
    {
        $this->accessory_list = $accessory_list;
    }



    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->room_id;
    }

    /**
     * @param mixed $room_id
     */
    public function setRoomId($room_id)
    {
        $this->room_id = $room_id;
    }

    /**
     * @return mixed
     */
    public function getAccessoryName()
    {
        return $this->accessory_name;
    }

    /**
     * @param mixed $accessory_name
     */
    public function setAccessoryName($accessory_name)
    {
        $this->accessory_name = $accessory_name;
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
    protected $table = 'tbl_room_accessory';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * setting use increment number or not
     * @var bool
     */
    public $incrementing = true;

    /**
     * setting use timestamps or not
     * @var bool
     */
    public $timestamps = false;
}