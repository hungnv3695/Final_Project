<?php
/**
 * Created by PhpStorm.
 * User: SonDC
 * Date: 7/28/2017
 * Time: 3:39 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

    private $userID;
    private $group;

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
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }




    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user_group';

    /**
     * setting primary key
     * @var string
     */
    protected $primaryKey = 'seq_no';

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