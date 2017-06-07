<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMaster extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user_master';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;
}
