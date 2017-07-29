<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 6/29/2017
 * Time: 8:36 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationDetail extends Model{
    private $id;
    private $reservationId;
    private $room_id;
    private $price;
    private $create_ymd;

    /**
     * @return array
     */
    public function getFillable()
    {
        return $this->fillable;
    }

    /**
     * @param array $fillable
     */
    public function setFillable($fillable)
    {
        $this->fillable = $fillable;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @param mixed $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
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
    public function getCreateYmd()
    {
        return $this->create_ymd;
    }

    /**
     * @param mixed $create_ymd
     */
    public function setCreateYmd($create_ymd)
    {
        $this->create_ymd = $create_ymd;
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_reservation_detail';

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
    //protected $dateFormat = ;
    //const CREATED_AT = '';
    const UPDATED_AT = 'update_ymd';

}