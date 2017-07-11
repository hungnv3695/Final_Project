<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/8/2017
 * Time: 9:27 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    private $roomID;
    private $room_type_id;
    private $floor;
    private $status_id;
    private $room_number;

    /**
     * @return mixed
     */
    public function getRoomID()
    {
        return $this->roomID;
    }

    /**
     * @param mixed $roomID
     * @return Room
     */
    public function setRoomID($roomID)
    {
        $this->roomID = $roomID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoomTypeId()
    {
        return $this->room_type_id;
    }

    /**
     * @param mixed $room_type_id
     */
    public function setRoomTypeId($room_type_id)
    {
        $this->room_type_id = $room_type_id;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getStatusId()
    {
        return $this->status_id;
    }

    /**
     * @param mixed $status_id
     */
    public function setStatusId($status_id)
    {
        $this->status_id = $status_id;
    }

    /**
     * @return mixed
     */
    public function getRoomNumber()
    {
        return $this->room_number;
    }

    /**
     * @param mixed $room_number
     */
    public function setRoomNumber($room_number)
    {
        $this->room_number = $room_number;
    }



    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_room';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'room_id';

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