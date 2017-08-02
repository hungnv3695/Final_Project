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

    private $customerName;
    private $customerIC;
    private $customerPhone;
    private $customerEmail;
    private $updateYmd;

    private $dateIn;
    private $dateOut;

    /**
     * @return mixed
     */
    public function getDateIn()
    {
        return $this->dateIn;
    }

    /**
     * @param mixed $dateIn
     */
    public function setDateIn($dateIn)
    {
        $this->dateIn = $dateIn;
    }

    /**
     * @return mixed
     */
    public function getDateOut()
    {
        return $this->dateOut;
    }

    /**
     * @param mixed $dateOut
     */
    public function setDateOut($dateOut)
    {
        $this->dateOut = $dateOut;
    }
    /**
     * @return array
     */
    public function getGuarded()
    {
        return $this->guarded;
    }

    /**
     * @param array $guarded
     */
    public function setGuarded($guarded)
    {
        $this->guarded = $guarded;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getCustomerIC()
    {
        return $this->customerIC;
    }

    /**
     * @param mixed $customerIC
     */
    public function setCustomerIC($customerIC)
    {
        $this->customerIC = $customerIC;
    }

    /**
     * @return mixed
     */
    public function getCustomerPhone()
    {
        return $this->customerPhone;
    }

    /**
     * @param mixed $customerPhone
     */
    public function setCustomerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param mixed $customerEmail
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return mixed
     */
    public function getUpdateYmd()
    {
        return $this->updateYmd;
    }

    /**
     * @param mixed $updateYmd
     */
    public function setUpdateYmd($updateYmd)
    {
        $this->updateYmd = $updateYmd;
    }

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