<?php
/**
 * Created by PhpStorm.
 * User: Nguyen Viet Hung
 * Date: 6/29/2017
 * Time: 8:36 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation_Model extends Model{
    private  $id;
    private  $guest_id;
    private  $guest_name;
    private  $email;
    private  $phone;
    private  $company;
    private  $status;
    private $check_in;
    private $check_out;
    private $quantity;
    private $amount;
    private $room1;
    private $room_type_1;
    private $room2;
    private $room_type_2;
    private $room3;
    private $room_type_3;
    private $identity_card;

    /**
     * @return mixed
     */
    public function getGuestId()
    {
        return $this->guest_id;
    }

    /**
     * @param mixed $guest_id
     */
    public function setGuestId($guest_id)
    {
        $this->guest_id = $guest_id;
    }
    /**
     * @return mixed
     */
    public function getIdentityCard()
    {
        return $this->identity_card;
    }

    /**
     * @param mixed $identity_card
     */
    public function setIdentityCard($identity_card)
    {
        $this->identity_card = $identity_card;
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
    public function getGuestName()
    {
        return $this->guest_name;
    }

    /**
     * @param mixed $guest_name
     */
    public function setGuestName($guest_name)
    {
        $this->guest_name = $guest_name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCheckIn()
    {
        return $this->check_in;
    }

    /**
     * @param mixed $check_in
     */
    public function setCheckIn($check_in)
    {
        $this->check_in = $check_in;
    }

    /**
     * @return mixed
     */
    public function getCheckOut()
    {
        return $this->check_out;
    }

    /**
     * @param mixed $check_out
     */
    public function setCheckOut($check_out)
    {
        $this->check_out = $check_out;
    }

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
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getRoom1()
    {
        return $this->room1;
    }

    /**
     * @param mixed $room1
     */
    public function setRoom1($room1)
    {
        $this->room1 = $room1;
    }

    /**
     * @return mixed
     */
    public function getRoomType1()
    {
        return $this->room_type_1;
    }

    /**
     * @param mixed $room_type_1
     */
    public function setRoomType1($room_type_1)
    {
        $this->room_type_1 = $room_type_1;
    }

    /**
     * @return mixed
     */
    public function getRoom2()
    {
        return $this->room2;
    }

    /**
     * @param mixed $room2
     */
    public function setRoom2($room2)
    {
        $this->room2 = $room2;
    }

    /**
     * @return mixed
     */
    public function getRoomType2()
    {
        return $this->room_type_2;
    }

    /**
     * @param mixed $room_type_2
     */
    public function setRoomType2($room_type_2)
    {
        $this->room_type_2 = $room_type_2;
    }

    /**
     * @return mixed
     */
    public function getRoom3()
    {
        return $this->room3;
    }

    /**
     * @param mixed $room3
     */
    public function setRoom3($room3)
    {
        $this->room3 = $room3;
    }

    /**
     * @return mixed
     */
    public function getRoomType3()
    {
        return $this->room_type_3;
    }

    /**
     * @param mixed $room_type_3
     */
    public function setRoomType3($room_type_3)
    {
        $this->room_type_3 = $room_type_3;
    }


}