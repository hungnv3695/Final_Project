<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    public $userID;
    public $password;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_user';

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
