<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 6/29/2017
 * Time: 8:36 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
    private $id;
    private $statusId;
    private $guestId;
    private $checkIn;
    private $checkOut;
    private $numberOfRoom;
    private $numberOfAdult;
    private $numberOfChildren;
    private $note;
    private $editer;
    private $updateYmd;
    private $createYmd;

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
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param mixed $statusId
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return mixed
     */
    public function getGuestId()
    {
        return $this->guestId;
    }

    /**
     * @param mixed $guestId
     */
    public function setGuestId($guestId)
    {
        $this->guestId = $guestId;
    }

    /**
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }

    /**
     * @param mixed $checkIn
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
    }

    /**
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }

    /**
     * @param mixed $checkOut
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
    }

    /**
     * @return mixed
     */
    public function getNumberOfRoom()
    {
        return $this->numberOfRoom;
    }

    /**
     * @param mixed $numberOfRoom
     */
    public function setNumberOfRoom($numberOfRoom)
    {
        $this->numberOfRoom = $numberOfRoom;
    }

    /**
     * @return mixed
     */
    public function getNumberOfAdult()
    {
        return $this->numberOfAdult;
    }

    /**
     * @param mixed $numberOfAdult
     */
    public function setNumberOfAdult($numberOfAdult)
    {
        $this->numberOfAdult = $numberOfAdult;
    }

    /**
     * @return mixed
     */
    public function getNumberOfChildren()
    {
        return $this->numberOfChildren;
    }

    /**
     * @param mixed $numberOfChildren
     */
    public function setNumberOfChildren($numberOfChildren)
    {
        $this->numberOfChildren = $numberOfChildren;
    }

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
    public function getEditer()
    {
        return $this->editer;
    }

    /**
     * @param mixed $editer
     */
    public function setEditer($editer)
    {
        $this->editer = $editer;
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
     * @return mixed
     */
    public function getCreateYmd()
    {
        return $this->createYmd;
    }

    /**
     * @param mixed $createYmd
     */
    public function setCreateYmd($createYmd)
    {
        $this->createYmd = $createYmd;
    }
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_reservation';

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