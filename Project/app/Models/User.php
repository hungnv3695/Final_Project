<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/28/2017
 * Time: 3:33 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    private $userID;
    private $userName;
    private $password;
    private $lock;
    private $delete;
    private $phone;
    private $mail;
    private $identityCard;
    private $taxCode;
    private $address;
    private $location;

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }



    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLock()
    {
        return $this->lock;
    }

    /**
     * @param mixed $lock
     */
    public function setLock($lock)
    {
        $this->lock = $lock;
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param mixed $delete
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getIdentityCard()
    {
        return $this->identityCard;
    }

    /**
     * @param mixed $identityCard
     */
    public function setIdentityCard($identityCard)
    {
        $this->identityCard = $identityCard;
    }

    /**
     * @return mixed
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * @param mixed $taxCode
     */
    public function setTaxCode($taxCode)
    {
        $this->taxCode = $taxCode;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }




    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'user_id';

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