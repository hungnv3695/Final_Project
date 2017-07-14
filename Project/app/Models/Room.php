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
    private $roomTypeID;
    private $floor;
    private $statusID;
    private $roomNumber;
    private $note;

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }



    /**
     * @return mixed
     */
    public function getRoomID()
    {
        return $this->roomID;
    }

    /**
     * @param mixed $roomID
     */
    public function setRoomID($roomID)
    {
        $this->roomID = $roomID;
    }

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
    public function getStatusID()
    {
        return $this->statusID;
    }

    /**
     * @param mixed $statusID
     */
    public function setStatusID($statusID)
    {
        $this->statusID = $statusID;
    }

    /**
     * @return mixed
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * @param mixed $roomNumber
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
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